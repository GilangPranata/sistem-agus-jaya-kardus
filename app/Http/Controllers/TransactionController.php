<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Transaction;
use App\Models\TransactionProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Tambahan:
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transactions = Transaction::query()
            ->when($request->from, fn($q) => $q->whereDate('created_at', '>=', $request->from))
            ->when($request->to, fn($q) => $q->whereDate('created_at', '<=', $request->to))
            ->with('customer')
            ->latest()
            ->get();

        return view('admin.pages.transaction.index', compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productIds = $request->product_id;
        $quantities = $request->qty;

        DB::beginTransaction();

        try {
            $invoice = (new Transaction)->createInvoice();

            $transaction = new Transaction();
            $transaction->type = $request->type;
            $transaction->customer_id = $request->customer_id;
            $transaction->invoice = $invoice;
            $transaction->total_amount = 0;
            $transaction->save();

            $totalAmount = 0;

            foreach ($productIds as $index => $productId) {
                $qty = (int) $quantities[$index];
                $product = Product::findOrFail($productId);
                $subtotal = $product->purchase_price * $qty;
                $totalAmount += $subtotal;

                TransactionProducts::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $productId,
                    'quantity' => $qty,
                    'subtotal' => $subtotal,
                ]);

                $product->increment('stock', $qty);
            }

            $transaction->total_amount = $totalAmount;
            $transaction->save();

            DB::commit();

            return redirect()->route('transaction.index')->with('success', 'Transaksi pembelian berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Export PDF
     */
    public function exportPdf(Request $request)
    {
        $transactions = $this->getFilteredTransactions($request);

        $pdf = Pdf::loadView('admin.pages.transaction.export_pdf', compact('transactions'));
        return $pdf->download('riwayat-transaksi.pdf');
    }

    /**
     * Export Excel
     */
    public function exportExcel(Request $request)
    {
        return Excel::download(new TransactionExport($request), 'riwayat-transaksi.xlsx');
    }

    /**
     * Helper: Filter transaksi sesuai tanggal
     */
    private function getFilteredTransactions(Request $request)
    {
        $query = Transaction::with('customer')->orderBy('created_at', 'desc');

        if ($request->from && $request->to) {
            $query->whereBetween('created_at', [$request->from . ' 00:00:00', $request->to . ' 23:59:59']);
        }

        return $query->get();
    }

    // Tambahan metode kosong default
    public function create() {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\TransactionProducts;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
      $sales = Transaction::query()
    ->where('type', 'purchase') // Hanya ambil transaksi penjualan
    ->when($request->from, fn($q) => $q->whereDate('created_at', '>=', $request->from))
    ->when($request->to, fn($q) => $q->whereDate('created_at', '<=', $request->to))
    ->with('customer')
    ->latest()
    ->get(); // get semua data tanpa pagination


        return view('admin.pages.purchase.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $products = Product::all();
        $buyers = Customer::where('type', 'buyer')->get(); // Ambil customer dengan type 'buyer'
    //    dd($buyers);
       return view('admin.pages.purchase.form', compact('products', 'buyers'));
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
            // Buat invoice dan transaksi awal
            $invoice = (new Transaction)->createInvoice();

            $transaction = new Transaction();
            $transaction->type = $request->type; // 'purchase'
            $transaction->customer_id = $request->customer_id;
            $transaction->invoice = $invoice;
            $transaction->total_amount = 0; // sementara
            $transaction->save();

            $totalAmount = 0;

            foreach ($productIds as $index => $productId) {
                $qty = (int) $quantities[$index];
                $product = Product::findOrFail($productId);
                $subtotal = $product->purchase_price * $qty;
                $totalAmount += $subtotal;

                // Simpan detail transaksi
                TransactionProducts::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $productId,
                    'quantity' => $qty,
                    'subtotal' => $subtotal,
                ]);

                // Tambahkan stok produk
                $product->increment('stock', $qty);
            }

            // Update total transaksi
            $transaction->total_amount = $totalAmount;
            // dd($transaction->total_amount);
            $transaction->save();

            DB::commit();

            return redirect()->route('purchase.index')->with('success', 'Transaksi pembelian berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Purchase::findOrFail($id);
        $transaction->delete();
        return redirect()->route('riwayat-transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }

    public function printTransactions()
{
    $transactions = Purchase::with(['product', 'customer'])->get();

    $pdf = Pdf::loadView('admin.pages.print-pdf.transactions', compact('transactions'));

    return $pdf->download('transactions.pdf');
}
}

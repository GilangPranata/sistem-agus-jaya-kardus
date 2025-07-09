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
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $products = Product::all();
        $customers = Customer::all();
       
       return view('admin.pages.purchase.form', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productIds = $request->product_id;
        $quantities = $request->qty;
        $customerId = $request->customer_id;
    
        DB::beginTransaction();
    
        try {
            // Hitung total amount
            $totalAmount = 0;
            foreach ($productIds as $index => $productId) {
                $product = Product::findOrFail($productId);
                $qty = (int) $quantities[$index];
                $subtotal = $product->purchase_price * $qty;
                $totalAmount += $subtotal;
            }
    
            // Buat Purchase
            $purchase = Purchase::create([
                'invoice' => (new Purchase)->createInvoice(),
                'customer_id' => $customerId, // simpan juga di sini
                'qty' => array_sum($quantities), // total semua qty
                'price' => $totalAmount,
            ]);
    
            // Buat Transaction utama
            $transaction = $purchase->transactions()->create([
                'customerable_id' => $customerId,
                'customerable_type' => 'App\Models\Customer', // ganti sesuai modelmu
                'total_amount' => $totalAmount,
            ]);
    
            // Masukkan ke tabel detail transaksi
            foreach ($productIds as $index => $productId) {
                $product = Product::findOrFail($productId);
                $qty = (int) $quantities[$index];
                $subtotal = $product->purchase_price * $qty;
    
                TransactionProducts::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $productId,
                    'quantity' => $qty,
                    'subtotal' => $subtotal,
                ]);
    
                // Update stok
                $product->increment('stock', $qty);
            }
    
            DB::commit();
    
            return redirect()->route('transaction.index')->with('success', 'Pembelian berhasil disimpan');
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

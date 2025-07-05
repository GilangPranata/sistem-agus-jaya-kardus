<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        // dd($request->all());
       $product = Product::findOrFail($request->product_id);
        $invoice = (new Purchase)->createInvoice();
     $purchase = Purchase::create([
            'invoice' => $invoice,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'price' => $product->purchase_price * $request->qty, // Calculate total price based on purchase price and quantity
            'customer_id' => $request->customer_id,
        ]);

       $purchase->transactions()->create();

        // update stock product 
        $product = Product::findOrFail($request->product_id);
       
        $product->stock = $product->stock + $request->qty;
        $product->save();

        return redirect()->route('transaction.index')->with('success', 'Pembelian berhasil disimpan');
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

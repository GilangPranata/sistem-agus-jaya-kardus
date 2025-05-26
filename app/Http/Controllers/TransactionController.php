<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
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
        
       return view('admin.pages.transaksi.form', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $invoice = (new Transaction)->createInvoice();
     $transaction = Transaction::create([
            'invoice' => $invoice,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'price' => $request->price,
            'customer_id' => $request->customer_id,
        ]);

        // update stock product
        $product = Product::findOrFail($request->product_id);
        if ($product->stock < $request->qty) {
            return redirect()->route('riwayat-transaksi.index')->with('error', 'Stok tidak mencukupi');
        }
        $product->stock = $product->stock - $request->qty;
        $product->save();

        return redirect()->route('riwayat-transaksi.index')->with('success', 'Transaksi berhasil disimpan');
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
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('riwayat-transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }

    public function printTransactions()
{
    $transactions = Transaction::with(['product', 'customer'])->get();

    $pdf = Pdf::loadView('admin.pages.print-pdf.transactions', compact('transactions'));

    return $pdf->download('transactions.pdf');
}
}

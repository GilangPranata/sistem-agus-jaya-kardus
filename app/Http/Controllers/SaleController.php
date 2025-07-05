<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Collector;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $collectors = Collector::all();
        
       return view('admin.pages.sale.form', compact('products', 'collectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $product = Product::findOrFail($request->product_id);

        // Create a new sale record
        $invoice = (new Sale)->createInvoice();
        $sale = new Sale();
        $sale->product_id = $request->product_id;
        $sale->collector_id = $request->collector_id;
        $sale->qty = $request->qty;
        $sale->price = $product->sale_price * $request->qty; // Calculate total price based on sale price and quantity
        $sale->invoice = $invoice;
        $sale->save();

        // Update product stock
        // if stock is less than qty
        if ($request->qty > $sale->product->stock) {
            return redirect()->back()->with(['error' => 'Stok tidak cukup untuk melakukan penjualan']);
        }
        $product = Product::findOrFail($request->product_id);
        $product->stock -= $request->qty;
        $product->save();

          // update to history transaction
          $sale->transactions()->create();
        

        return redirect()->route('transaction.index')->with('success', 'Penjualan berhasil disimpan');
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
        //
    }
}

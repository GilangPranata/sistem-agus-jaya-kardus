<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RequestOrder;
use Illuminate\Http\Request;

class RequestOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all request orders
        $requestOrders = RequestOrder::with(['collector', 'product'])->get();

        // Return the view with the request orders
        return view('admin.pages.request-order.index', compact('requestOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.pages.request-order.form', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       RequestOrder::create([
            'product_id' => $request->product_id,
            'collector_id' => 1,
            'quantity' => $request->quantity,
            'status' => 'pending', // default status
        ]);

        // Redirect back to the request order index with a success message
        return redirect()->route('request-order.create')->with('success', 'Permintaan berhasil dibuat');
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
        $requestOrders = RequestOrder::findOrFail($id);
        // change the status to approved
        $requestOrders->status = 'approved';
        $requestOrders->save();
        // Redirect back to the request order index with a success message
        return redirect()->route('request-order.index')->with('success', 'Permintaan berhasil disetujui');
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

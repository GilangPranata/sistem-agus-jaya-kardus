<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\RequestOrder;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//    dd($request->all());
        $products = Product::all()->count();
        $categories = Category::all()->count();
        $staffs = Staff::all()->count();
        $customers = Customer::all()->count();
        $transactions = Transaction::all()->count();
        $requestOrders = RequestOrder::all()->count();

        // total income sum(qty * price)
        $totalIncome = DB::table('sales')->sum(DB::raw('qty * price'));
       
        $totalOutcome = DB::table('purchases')->sum(DB::raw('qty * price'));
      
        $month = $request->input('month', date('m')); // Default to current month

    // // Count transactions for the selected month
    $transactions = Transaction::whereMonth('created_at', $month)->count();

        $month = date('F', mktime(0, 0, 0, $month, 1));
        // inputed month 
        return view('admin.pages.dashboard.index', compact('products', 'categories', 'staffs', 'customers', 'transactions',  'month', 'requestOrders', 'totalIncome', 'totalOutcome'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

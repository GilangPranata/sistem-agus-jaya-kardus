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
    $selectedMonth = $request->input('month'); // Ambil bulan dari filter (1-12)

    // Jika bulan dipilih, filter berdasarkan bulan
    if ($selectedMonth) {
        $products = Product::whereMonth('created_at', $selectedMonth)->count();
        $categories = Category::whereMonth('created_at', $selectedMonth)->count();
        $staffs = Staff::whereMonth('created_at', $selectedMonth)->count();
        $buyers = Customer::where('type', 'buyer')->whereMonth('created_at', $selectedMonth)->count();
        $requestOrders = RequestOrder::whereMonth('created_at', $selectedMonth)->count();

        $transactions = Transaction::whereMonth('created_at', $selectedMonth)->count();

        $totalIncome = Transaction::where('type', 'sale')
            ->whereMonth('created_at', $selectedMonth)
            ->sum('total_amount');

        $totalOutcome = Transaction::where('type', 'purchase')
            ->whereMonth('created_at', $selectedMonth)
            ->sum('total_amount');
    } else {
        // Jika tidak ada bulan dipilih, tampilkan semua data
        $products = Product::count();
        $categories = Category::count();
        $staffs = Staff::count();
        $buyers = Customer::where('type', 'buyer')->count();
        $requestOrders = RequestOrder::count();

        $transactions = Transaction::count();
        $totalIncome = Transaction::where('type', 'sale')->sum('total_amount');
        $totalOutcome = Transaction::where('type', 'purchase')->sum('total_amount');
    }

    // Nama bulan untuk ditampilkan di view
    $month = $selectedMonth
        ? date('F', mktime(0, 0, 0, $selectedMonth, 1))
        : 'Semua';

    return view('admin.pages.dashboard.index', compact(
        'products',
        'categories',
        'staffs',
        'buyers',
        'transactions',
        'month',
        'requestOrders',
        'totalIncome',
        'totalOutcome'
    ));
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

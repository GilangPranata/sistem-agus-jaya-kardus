<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Product;
use App\Models\Category;
use App\Models\Collector;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\RequestOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function printDashboard(){
        $products = Product::all()->count();
        $categories = Category::all()->count();
        $collectors = Collector::all()->count();
        $customers = Customer::all()->count();
        $transactions = Transaction::all()->count();
        $requestOrders = RequestOrder::all()->count();

        // total income sum(qty * price)
        $totalIncome = DB::table('sales')->sum(DB::raw('qty * price'));
       
        $totalOutcome = DB::table('purchases')->sum(DB::raw('qty * price'));
    //   dd($products, $categories, $staffs, $customers, $transactions, $requestOrders, $totalIncome, $totalOutcome);
        return view('admin.pages.print-pdf.dashboard', compact('products', 'categories', 'collectors', 'customers', 'transactions', 'requestOrders', 'totalIncome', 'totalOutcome'));
       
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Collector;
use App\Models\Transaction;
use App\Models\RequestOrder;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function printDashboard(){
        $products = Product::all()->count();
        $categories = Category::all()->count();
     
        $buyers = Customer::where('type', 'buyer')->count(); // Count buyers
        $collectors = Customer::where('type', 'collector')->count(); // Count collectors
        $transactions = Transaction::all()->count();
        $requestOrders = RequestOrder::all()->count();

        // total income sum(qty * price)
        $totalIncome =\App\Models\Transaction::where('type', 'sale')->sum('total_amount');
       
        $totalOutcome  =\App\Models\Transaction::where('type', 'purchase')->sum('total_amount');
    //   dd($products, $categories, $staffs, $customers, $transactions, $requestOrders, $totalIncome, $totalOutcome);
        return view('admin.pages.print-pdf.dashboard', compact('products', 'categories', 'buyers','collectors', 'transactions', 'requestOrders', 'totalIncome', 'totalOutcome'));
       
    }

    public function printTransaction($id){

        $transaction = Transaction::with('customer', 'transactionProducts.product')->where('id', $id)->firstOrFail();
        $pdf = Pdf::loadView('admin.pages.print-pdf.transactions', compact('transaction'))->setPaper('A4');

        return $pdf->download('invoice-'.$transaction->invoice.'.pdf');
    }
}

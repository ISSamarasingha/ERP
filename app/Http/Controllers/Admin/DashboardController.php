<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {


        // Counts (for dashboard cards)
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();
        $totalUsers = User::count();
        $totalSum = Invoice::sum('total');


        //  for Data tables

        $products = Product::latest()->get();
        $customers = Customer::latest()->get();
        $users = User::latest()->get();

        return view('admin.dashboard', compact('products', 'customers', 'users', 'totalUsers', 'totalCustomers', 'totalProducts','totalSum'));
    }
}

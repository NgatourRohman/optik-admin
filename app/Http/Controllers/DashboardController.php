<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    //
}

public function index()
{
    return view('dashboard', [
        'totalProducts' => Product::count(),
        'totalOrders' => Order::count(),
        'outOfStock' => Product::where('stock', 0)->count()
    ]);
}

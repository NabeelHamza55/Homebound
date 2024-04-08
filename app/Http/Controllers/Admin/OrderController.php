<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $collection  = Order::all();
        return view("admin.dashboard.orders", compact("collection"));
    }
}

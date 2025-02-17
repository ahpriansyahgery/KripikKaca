<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Checkout;
use App\Models\Orderitem;
use App\Models\ProductVarians;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index()
    {
        
    return view('admin.dashboard');
    }
    public function order()
    {
        $orders = Order::with('user','checkout','orderitems.product','orderitems.productvarians')->get();
     
        return view('admin.order',compact('orders'));
    }
}

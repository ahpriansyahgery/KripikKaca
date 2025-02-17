<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
       $user = auth()->user();
        // Ambil order terbaru berdasarkan id user
       $orders = Order::where('user_id', $user->id) 
                        ->with('checkout') // Pastikan relasi checkout diambil
                        ->latest()
                        ->first();;

    //  Ambil order item jka order ditemukan
    $orderitems = $orders ? $orders->orderitems()->with('product')->get() : collect();

    return view('user.dashboard',compact('orders','orderitems','user'));
    }
}

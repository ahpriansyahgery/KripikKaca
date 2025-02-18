<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Checkout;
use App\Models\Orderitem;
use App\Exports\ExportOrder;
use Illuminate\Http\Request;
use App\Models\ProductVarians;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


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
    public function statusOrder(Request $request,Order $order)
    {
        $order->is_paid =true;
        $order->save();
        return redirect()->back();
    }
    public function exportOrder()
    {
        return Excel::download(new ExportOrder, 'order.xlsx');
    }
}

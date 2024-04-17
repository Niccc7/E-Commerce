<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item;
use App\Exports\OrdersExport;
use Excel;


class OrderController extends Controller
{
    public function index_admin() {
        $profile = Auth()->user();
        $orders = Order::orderBy('id','DESC')->get();
        return view('Admin.order.index', ['title'=> 'Order','profile' => $profile])->with('orders', $orders);
    }
    public function detail_admin($id) {
        $orders = Order_item::where('order_id', $id)->get();
        $profile = Auth()->user();
        return view('Admin.order.detail', ['profile' => $profile])->with('orders', $orders);
    }
    public function export_excel() {
        return Excel::download(new OrdersExport, 'Order.xlsx');
    }
    public function payment_report() {
        $profile = Auth()->user();
        $orders = Order::orderBy('id','DESC')->get();
        return view('Admin.order.index', ['title'=> 'Report','profile' => $profile])->with('orders', $orders);
    }
}

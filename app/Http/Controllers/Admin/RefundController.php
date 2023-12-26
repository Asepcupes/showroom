<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RefundController extends Controller
{
    public function index(Request $request)
    {
        // query where status %like% Refund
        $orders = Order::ith(['user'])->where('status', 'like', "%Refund%")
        // create orderBy status RequestedRefund,ReturnShipped,ReturnDelivered
        // ->orderByRaw(DB::raw("FIELD(status, 'RequestedRefund', 'ReturnShipped', 'ReturnDelivered')"))
        ->orderBy(DB::raw("FIELD(status, 'RequestedRefund', 'ReturnShipped', 'ReturnDelivered')"))
        ->paginate($request->per_page ?? 15);

        // return view('admin.refund.index', compact('orders'));
        return $orders;
    }

    public function show(Order $order)
    {
        $order->load(['user', 'order_items', 'product', 'master_account']);

        return $order;
    }

    public function accept(Order $order)
    {
        $order->update(['status' => Order::REFUND_DONE]);
        // TODOS Cek OrderData Admin Controller

        return $order;
    }

    public function reject(Order $order)
    {
        $order->update(['status' => Order::REFUND_DECLINED]);

        return $order;
    }


}

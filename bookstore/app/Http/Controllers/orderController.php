<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\orders;
use App\Models\orders_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function order()
    {
        $orders = orders::where('user_id', Auth::user()->id)->get();
        $categories = categories::get();

        return view('myorders', [
            'orders' => $orders,
            'categories' => $categories
        ]);
    }

    public function orderCreate()
    {
        if (Auth::user()) {
            DB::beginTransaction();

            $cart_items = session('cartItems');

            $order = new orders();

            $order->total_amount = array_reduce(session('cartItems'), function ($carry, $item) {
                return $carry + $item['quantity'] * $item['price'];
            }, 0);

            $order->total_items = count($cart_items);
            $order->user_id = Auth::user()->id;
            $order->save();

            foreach ($cart_items as $cart_item) {
                $orderItem = new orders_items();
                $orderItem->qty = $cart_item['quantity'];
                $orderItem->book_id = $cart_item['id'];
                $orderItem->order_id = $order->id;
                $orderItem->save();
            }

            DB::commit();
            session()->put('cartItems', []);
            return redirect('myorders');
        } else {
            return redirect('login');
        }
    }

    public function index(Request $req)
    {
        $orderItems = orders_items::where('order_id', $req->id)->get();
        $categories = categories::get();

        return view('orderdetails', [
            'orderItems' => $orderItems,
            'categories' => $categories
        ]);
    }

    public function adminOrder()
    {
        $orders = orders::get();
        return view('admin.order.orders', [
            'orders' => $orders
        ]);
    }

    public function adminOrderView($id)
    {
        $orderItems = orders_items::where('order_id', $id)->get();
        return view('admin.order.view', [
            'orderItems' => $orderItems
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $categories = Category::get();

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

            $order = new Order();

            $order->total_amount = array_reduce(session('cartItems'), function ($carry, $item) {
                return $carry + $item['quantity'] * $item['price'];
            }, 0);

            $order->total_items = count($cart_items);
            $order->user_id = Auth::user()->id;
            $order->save();

            foreach ($cart_items as $cart_item) {
                $orderItem = new OrderItem();
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
        $orderItems = OrderItem::where('order_id', $req->id)->get();
        $categories = Category::get();

        return view('orderdetails', [
            'orderItems' => $orderItems,
            'categories' => $categories
        ]);
    }

    // Admin Part
    public function adminOrder(){
        $orders = Order::get();
        return view('admin.order.orders', [
            'orders' => $orders
        ]);
    }

    public function adminOrderView($id)
    {
        $orderItems = OrderItem::where('order_id', $id)->get();
        return view('admin.order.view', [
            'orderItems' => $orderItems
        ]);
    }
}

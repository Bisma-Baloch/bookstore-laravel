<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function index(){
        return view('orderdetails');
    }

    public function order(){
        return view('myorders');
    }
}

// function index(){
//     $orders = order::where('user_id',Auth::user()->id)->get();
//     return view("lodin.myorders", [
//         'orders' =>$orders
//     ]);
// }

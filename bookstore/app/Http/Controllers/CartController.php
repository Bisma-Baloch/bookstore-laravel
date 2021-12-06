<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $categories = categories::get();
        return view('cart',[
            'categories' =>$categories
        ]);

    }

    public function addToCart(Request $req){
        
        if(Auth::user()){
            $existingItems = session()->get('cartItems',[]);
            $existingItems[] = $req->all();
            session()->put('cartItems',$existingItems);
            return redirect('cart');
        }else{
            return redirect('login');
        }
        }
        public function deleteCart(Request $req){
            $cartItem  = session()->pull('cartItems',[]);
            array_splice($cartItem,$req->index,1);
            session()->put('cartItems',$cartItem);
        return redirect('cart');
    
        }

}

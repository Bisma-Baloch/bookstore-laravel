<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('signup',[
            'categories' =>$categories
       
        ]);
    }

    public function signupConfirm(Request $req){
        $req->validate([
            'name' => 'string|min:3|max:15',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'type' => 'required'
        ]);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->type = $req->type;
        $user->save();
        return redirect('index');

    }    
}
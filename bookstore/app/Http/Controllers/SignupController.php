<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        $categories = categories::get();
        return view('signup',[
            'categories' =>$categories
       
        ]);
    }

    public function signupConfirm(Request $req){
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect('index');

    }
    
}

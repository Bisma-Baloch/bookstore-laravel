<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view(
            'login',
            [
                'categories' => $categories
            ]
        );
    }

    public function loginconfirm(Request $req)
    {
        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'max:8']
        ]);
        $credential = $req->only('email', 'password');

        if (Auth::attempt($credential)) {
            $req->session()->regenerate();
            return redirect('index');
        }
        return back()->withErrors([
            'email' => 'the provided credentials do not match'
        ]);
    }
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('index');
    }
}

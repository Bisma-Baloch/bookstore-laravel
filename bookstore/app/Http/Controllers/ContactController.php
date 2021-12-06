<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $categories = categories::get();
        return view('contact',[
            'categories' =>$categories
        ]);
    }
}

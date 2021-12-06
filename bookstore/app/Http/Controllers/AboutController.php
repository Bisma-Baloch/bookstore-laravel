<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $categories = categories::get();
        return view('about' ,[
            'categories' =>$categories
        ]);

    }
}

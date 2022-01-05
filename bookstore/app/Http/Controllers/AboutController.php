<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('about' ,[
            'categories' =>$categories
        ]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\categories;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $books = books::get();
        return view('index',[
            'books' => $books
        ]);
        // $categories = categories::get();
        // return view('index',[
        //     'categories' => $categories
        // ]);

    }
}

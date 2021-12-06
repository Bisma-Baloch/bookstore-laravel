<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\categories;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function index(){
        $books = books::get();
        $categories = categories::get();
        return view('index',[
            'books' => $books,
            'categories'=>$categories
        ]);

    }
        public function bookDetail(Request $request){
            $book = books::findOrFail($request->id);
            $categories = categories::get();
            return view('bookDetails',[
                'book' =>$book,
                'categories'=>$categories
            ]
          );
    }

    public function category($id){
        $books = books::where('category_id',$id)->get();
        
        $categories = categories::get();
        
        $categoryName = categories::select('name')->findOrFail($id);
        
        return view('category',[
            'books' => $books,
            'categoryName' => $categoryName,
            'categories' =>$categories
        ]);

    }

}

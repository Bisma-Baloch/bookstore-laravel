<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\books;
use App\Models\categories;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function index(){
        $books = Book::get();
        $categories = Category::get();
        return view('index',[
            'books' => $books,
            'categories'=>$categories
        ]);

    }
        public function bookDetail(Request $request){
            $book = Book::findOrFail($request->id);
            $categories = Category::get();
            return view('bookDetails',[
                'book' =>$book,
                'categories'=>$categories
            ]
          );
    }

    public function category($id){
        $books = Book::where('category_id',$id)->get();
        
        $categories = Category::get();
        
        $categoryName = Category::select('name')->findOrFail($id);
        
        return view('category',[
            'books' => $books,
            'categoryName' => $categoryName,
            'categories' =>$categories
        ]);

    }

}

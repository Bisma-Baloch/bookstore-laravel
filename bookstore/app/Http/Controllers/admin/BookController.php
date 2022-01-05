<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\authors;
use App\Models\Book;
use App\Models\books;
use App\Models\categories;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::get();
        return view('admin.books.index',[
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::get();
        $categories = Category::get();
        return view('admin.books.create',[
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'author_id' => 'numeric|exists:authors,id',
            'category_id' => 'numeric|exists:categories,id',
            'image' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|min:50|max:300'
        ]);

        $books = new Book();
       
        $books->name = $request->name;
        $books->author_id = $request->author_id;
        $books->category_id = $request->category_id;
        $books->image = $request->image;
        $books->price = $request->price;
        $books->description = $request->description;

        $books->save();

        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::get();
        $categories = Category::get();
        $books = Book::find($id);
        return view('admin.books.edit',[
            'books'=>$books,
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|min:3|max:50',
            'author_id' => 'numeric|exists:authors,id',
            'category_id' => 'numeric|exists:categories,id',
            'image' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|min:50|max:300'
        ]);


        $books = Book::findOrFail($id);

        $books->name = $request->name;
        $books->author_id = $request->author_id;
        $books->category_id = $request->category_id;
        $books->image = $request->image;
        $books->price = $request->price;
        $books->description = $request->description;

        $books->update();

        return redirect(route('books.index'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = Book::findorFail($id);

        $books->delete();
 
        return redirect()->route('books.index');
 
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\authors;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = authors::get();
        return view('admin.author.authors',[
           'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'name' => 'required|min:3|max:50'
        ]);
        $authors = new authors();
        $authors->name = $request->name;
        $authors->save();


        return redirect(route('authors.index'));
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
        $author = authors::find($id);
       return view('admin.author.edit',['author'=>$author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50'
        ]);

        $author = authors::findOrFail($id);
        $author->name = $request->name;
        $author->update();

        return redirect(route('authors.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $authors = authors::findorFail($id);

       $authors->delete();

       return redirect()->route('authors.index');
    }
}

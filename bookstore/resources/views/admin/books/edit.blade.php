@extends('admin.layouts')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $err)
        <li> {{ $err }} </li>
        @endforeach
    </ul>
</div>
@endif


    <br><br>

    <div class="container">
        
        <form class="w-50" action="{{route('books.update', $books->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="inputAddress">Book Name</label>
                <input type="text" class="form-control" name="name" value="{{$books->name}}" placeholder="Book name here">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Author</label>
                    <select class="form-control" name="author_id">
                        <option selected>Choose Author...</option>
                        @foreach ($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        <option selected>Choose Category...</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        <option>...</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Price</label>
                    <input class="form-control" name="price" value="{{$books->price}}" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label>Image</label>
                    <input class="form-control" name="image" value="{{$books->image}}" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="md-textarea form-control" name="description" value="{{$books->description}}" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

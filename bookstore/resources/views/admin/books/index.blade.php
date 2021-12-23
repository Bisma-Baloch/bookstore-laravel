@extends('admin.layouts')

@section('content')

<br>
<table class="table mx-auto mt-5 text-center">

    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Image</th>
        <th>Category</th>
        <th>Authors</th>
        <th>Price</th>
        <th colspan="2">Action</th>
    </tr>

    @foreach ($books as $book)
    <tr>
        <td>{{$book->id}}</td>
        <td>{{ $book->name }}</td>
        <td><img src="{{ $book->image }}" alt="" width="60" height="60"></td>
        <td>{{ $book->category->name }}</td>
        <td> {{$book->author->name}}</td>
        <td>Rs {{$book->price}}</td>
        <td>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Update</a>
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>    
<br><br>

<div class="container text-center">
<a href="{{route('books.create')}}" role="button" class="btn btn-success">Create</a>
</div>
@endsection
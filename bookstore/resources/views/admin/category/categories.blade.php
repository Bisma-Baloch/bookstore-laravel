@extends('admin.layouts')

@section('content')

<br><br>
<table class="table mx-auto mt-5 text-center w-75">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th colspan="2">Action</th>
    </tr>

    @foreach ($categories as $category )
        
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Update</a>
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
    <a href="{{route('categories.create')}}" role="button" class="btn btn-success">Create</a>
    </div>
    
@endsection
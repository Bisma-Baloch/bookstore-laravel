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
        <form class="w-25" action="{{route('categories.update', $categories->id)}}" method="POST">
            @csrf

            @method('PUT')
            <div class="form-group">
                <label for="inputAddress">Category Name</label>
                <input type="text" class="form-control" name="name" value="{{$categories->name}}" placeholder="Category Name Here..">
            </div>

         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection

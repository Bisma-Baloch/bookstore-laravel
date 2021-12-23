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
        <form class="w-25" action="{{route('authors.update', $author->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Author Name</label>
                <input type="text" name="name" class="form-control" value="{{$author->name}}" placeholder="Author Name Here..">
            </div>
         
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

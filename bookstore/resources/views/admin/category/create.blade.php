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
        <form class="w-25" action="{{route('categories.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="inputAddress">Category Name</label>
                <input type="text" name="name" class="form-control" placeholder="Category Name Here..">
            </div>

         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@extends('layout')

@section('content')
    <br><br><br>
    <h3 class="text-center ml-5">LOGIN</h3>
    <br>
    @if (session()->has('errors'))
    @endif
    <form class="mx-auto mb-5 w-25" action="{{ route('login-confirm') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
        </div>
        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
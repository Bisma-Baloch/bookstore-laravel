@extends('layout')

@section('content')

<br><br><br>
<h3 class="text-center ml-5">SIGN UP</h3>
<br>

<form class="mx-auto w-25" action="{{ route('signup-Confirm')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="username" class="form-control" placeholder="Enter username" name="name">
  </div>
 
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
  </div>
  {{-- <select class="custom-select mb-2">
      <option selected>Custom Select</option>
      <option value="admin">Admin</option>
      <option value="user">Customer</option>
    </select>
  --}}
  <button type="submit" value="Submit" class="btn btn-primary">Submit</button>                

</form>
<br><br>

@endsection

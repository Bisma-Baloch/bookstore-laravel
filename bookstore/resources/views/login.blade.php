@extends('layout')

@section('content')
<br><br><br>
<h3 class="text-center ml-5">LOGIN</h3>
<br>

<form class="mx-auto mb-5 w-25" action="/loginsubmit" method="POST">
    
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


 
@endsection
    

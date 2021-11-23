@extends('layout')

@section('content')

<input class="form-control mx-auto mt-4" style="width:50%" id="myInput" type="text" placeholder="Search..">
<br>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/bk.jpg') }}" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption mb-8">
        <h3>Best Seller Books</h3>
        <p>Discover the Knowledge</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/bk2.jpg') }}" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Online Book Store</h3>
        <p>Upto 40% Off</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/bk3.jpg') }}" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Book Of the Month</h3>
        <p>Interested in learning more about Book of the months. Click here to check out our website!</p>
        
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<h4 class="text-muted px-5 pt-5">ONLINE BOOK STORE</h4>
<br>
<hr>
<div class="container-fluid mt-5">
    <div class="row bg-muted mx-5">
      @foreach ($books as $book)
        <div class="col-lg-3 text-center bg-light pt-4">
            <a href="bookDetails"><img src="{{ $book->image }}" width="250px" height="320px"></a>
            <h4 class="mt-2">{{ $book->name }}</h4>
            <p>By: Robert Louis</p>
            <p>Rs {{$book->price}}</p>
            <button type="button" class="btn btn-primary rounded">Add to cart</button>
            <hr>

        </div>
        @endforeach  
  </div>
</div>
<br>


@endsection
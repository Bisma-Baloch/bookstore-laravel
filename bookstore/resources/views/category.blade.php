@extends('layout')

@section('content')

<input class="form-control mx-auto mt-4" style="width:50%" id="myInput" type="text" placeholder="Search..">

<br>
<br>
<h5 class="text-center text-muted text-uppercase">{{$categoryName->name}}</h5>


<div class="container-fluid mt-5">
    <div class="row bg-muted mx-5">
    @foreach ($books as $book)
    <div class="col-lg-3 text-center bg-light pt-4">
        <a href="{{route('book-detail',$book->id)}}"> <img src="{{asset($book->image)  }}" width="250px" height="320px"></a>
            <h5 class="mt-2">{{ $book->name }}</h5>
            <p>By: {{$book->author->name}}</p>
            <p>Rs {{$book->price}}</p>
            
            <form action="{{ route('cart-add') }}" method="POST">
                @csrf
                <div class="d-flex ml-5 pl-3">
                    <input type="number" class="box pl-2 text-center" name="quantity" value="1">
              <button class="btn btn-primary btn-md">Add To Cart</button>
            </div>
            <input type="hidden" name="id" value="{{ $book->id }}">
            <input type="hidden" name="name" value="{{ $book->name }}">
            <input type="hidden" name="author_name" value="{{ $book->author->name }}">
            <input type="hidden" name="image" value="{{ $book->image }}">
            <input type="hidden" name="price" value="{{ $book->price }}">
          </form>
          <hr>
          
        </div>
        @endforeach
    </div>
</div>
<br>


@endsection
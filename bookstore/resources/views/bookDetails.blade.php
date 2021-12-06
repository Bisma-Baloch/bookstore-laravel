@extends('layout')

@section('content')

<br><br><br>
<div class="row mx-auto w-75">
    <div class="col-sm-4">
        <img src="{{ asset($book->image) }}" width="320px" height="400px">

    </div>
    <div class="col-sm-8">
        <h3>{{$book->name}}</h3>
        <p>{{$book->author->name}}</p>
        <div class="review">
            <span class="star">
                <i class="fas fa-star"></i>
            </span>
            <span class="star">
                <i class="fas fa-star"></i>
            </span>
            <span class="star">
                <i class="fas fa-star"></i>
            </span>
            <span class="star">
                <i class="fas fa-star"></i>
            </span>
            <span class="star">
                <i class="fas fa-star-half"></i>
            </span>
        </div>
       
        <p>Rs {{$book->price}}</p>
        <input class="box pl-2" type="number" value="1" min="1">
                    
        <button type="button" class="btn btn-primary rounded">Add to cart</button>
        <br><br>
        <h4>Description</h4>
        <p>{{$book->description}}
    </p>


    </div>
</div>

@endsection
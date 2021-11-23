@extends('layout')

@section('content')

<br><br><br>
<div class="row mx-auto w-75">
    <div class="col-sm-4">
        <img src="{{ asset('img/img5.jpg') }}" width="300px" height="350px">

    </div>
    <div class="col-sm-8">
        <h3>The Philosphy Book</h3>
        <p>Ryan Holiday</p>
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
       
        <p>Rs 750</p>
        <input class="box pl-2" type="number" value="1" min="1">
                    
        <button type="button" class="btn btn-primary rounded">Add to cart</button>
        <br><br>
        <h4>Description</h4>
        <p>As political, economic, and environmental issues increasingly spread across the globe,
        the science of geography is being rediscovered by scientists, policymakers, and educators alike.
        Geography has been made a core subject in U.S. schools, and scientists
    </p>


    </div>
</div>

@endsection
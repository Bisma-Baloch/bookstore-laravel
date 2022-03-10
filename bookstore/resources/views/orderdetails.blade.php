@extends('layout')

@section('content')
    <br><br>

    <h4 class="text-left ml-4"> Welcome {{ Auth::user()->name }}</h4>

    <div class="container-fluid">
      
        <div class="row mx-auto mt-2">
            <div class="col-lg-8 ">
                <table class="table mx-auto mt-5 text-center">
                    <tr>
                        <th>Id </th>
                        <th>Order Id</th>
                        <th>Book</th>
                        <th>Image</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                    @php
                    $totalAmount;    
                    @endphp
                    @foreach ($orderItems as $index => $item)
                    @php
                    $totalAmount = $item->book->price * $item->qty ;
                    @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->order_id}}</td>
                            <td>{{ $item->book->name }}</td>
                            <td><img src="{{ asset($item->book->image) }}" alt="" width="50px"></td>
                            <td>{{ $item->book->author->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->book->price }}</td>
                            <td>{{ $item->book->price * $item->qty }}</td> 
                        </tr>
                    @endforeach

                </table>
            </div>

            <div class="col-lg-4 pl-5">
                <br>
                <h5>Order Summary</h5>
                <p>Total Items: {{ count ($orderItems) }}</p>
                <p>Total Price: {{ number_format($totalAmount, 2) }}</p> 
              
                <button type="submit" class="btn btn-primary rounded">Checkout</button>
            
            </div>
        </div>
    </div>
@endsection

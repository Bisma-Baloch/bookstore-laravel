@extends('layout')

@section('content')
    <br><br>
    <div class="container">
        <h3 class="mb-3">Cart</h3>

        <div class="row mx-auto mt-2">
            <div class="col-lg-8 ">
                <table class="table mx-auto mt-5">
                    <thead>
                        <tr>
                            <th>S.n </th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th><i class="fas fa-trash"></i></th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_items = 0;
                            $total_amount = 0;
                        @endphp

                        @if (Session::has('cartItems'))
                            @if (session('cartItems') == null)
                                <p>Your cart is empty!</p>
                            @endif

                            @foreach (session('cartItems') as $index => $cart_item)

                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $cart_item['name'] }}</td>
                                    <td><img src="{{ $cart_item['image'] }}" width="90px" height="90"></td>
                                    <td>{{ $cart_item['price'] }}</td>
                                    <td>{{ $cart_item['quantity'] }}</td>
                                    <td>{{ $cart_item['quantity'] * $cart_item['price'] }}</td>


                                    <form action="{{ route('delete') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" value="{{ $index++ }}">
                                        <td><button style="border: none"><i class="fas fa-trash"></i></button></td>

                                    </form>

                                </tr>

                            @endforeach
                            @php
                                $total_items = count(session('cartItems'));
                                $total_amount = array_reduce(
                                    session('cartItems'),
                                    function ($carry, $item) {
                                        return $carry + $item['quantity'] * $item['price'];
                                    },
                                    0,
                                );
                            @endphp
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 pl-5">
                <br>
                <h5>Product Summary</h5>
                <p>Total Items: {{ $total_items }}</p>
                <p>Total Price: {{ $total_amount }}</p>
                @if (empty(session('user')))
                    <form action="{{ route('create') }}" method="GET">
                        <button type="submit" class="btn btn-primary rounded">Submit</button>
                    </form>
                @endif

            </div>
        </div>
    </div>

@endsection

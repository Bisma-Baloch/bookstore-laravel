@extends('layout')

@section('content')

<table class="table mx-auto mt-5 text-center">
                <tr>
                    <th>Id </th>
                    <th>Book</th>
                    <th>Image</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
                @foreach ($orderItems as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->book->name }}</td>
                <td><img src="{{ asset($item->book->image) }}" alt="" width="50px"></td>
                <td>{{ $item->book->author->name }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->book->price }}</td>
                <td>{{ $item->book->price * $item->qty }}</td>
            </tr>
        @endforeach
        </table>
@endsection

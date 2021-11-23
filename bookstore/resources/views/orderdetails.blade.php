@extends('layout')

@section('content')

<table class="table mx-auto mt-5 text-center">
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Book</th>
                    <th>Image</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Science</td>
                    <td><img src="{{ asset('img/img3.jpg') }}" width="90px" height="90"></td>
                    <td>Robert Jonas</td>
                    <td>1</td>
                    <td>1000</td>
                    <td>1000</td>
                </tr>
            </tbody>
        </table>
@endsection

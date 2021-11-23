@extends('layout')

@section('content')

<br><br>
<table class="table mx-auto mt-5 text-center">
            <thead>
                <tr>
                    <th>Order Id </th>
                    <th>Total Quantity</th>
                    <th>Total Amount</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1001</td>
                    <td>2</td>
                    <td>2000</td>
                    <td>8-9-2020</td>
                    <td><a href="" class="btn btn-primary">View</a></td>
                </tr>
            </tbody>
        </table>
@endsection

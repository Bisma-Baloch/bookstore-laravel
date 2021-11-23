@extends('layout')

@section('content')

<br><br>
<div class="row mx-auto mt-5">
    <div class="col-lg-8 pl-5">
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
                <tr>
                    <td>1001</td>
                    <td>The Philosphy Book</td>
                    <td><img src="{{ asset('img/img3.jpg') }}" width="90px" height="90"></td>
                    <td>Rs 750</td>
                    <td>1</td>
                    <td>Rs 750</td>
                    <td><i class="fas fa-trash"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-4 pl-5">
        <br>
        <h5>Product Summary</h5>
        <p>Total Items: 0</p>
        <p>Total Price: 0</p>
        <button type="button" class="btn btn-primary rounded">Submit</button>

    </div>
</div>


@endsection
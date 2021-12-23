@extends('admin.layouts')

@section('content')

<br><br>
<table class="table mx-auto text-center">
        @if (empty($orders))
            <tr>
                <td colspan="3"> You have not ordered anything yet!</td>
            </tr>
        @else

            <tr>
                <th>Order Id </th>
                <th>Total Quantity</th>
                <th>Total Amount</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
            @foreach ($orders as $index => $order)

                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->total_items }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ date('d-m-y'), strtotime($order->created_at) }}</td>
                    <td><a href="{{ route('order', $order->id) }}" class="btn btn-primary">View</a></td>
                </tr>
            @endforeach
        @endif
</table>
@endsection
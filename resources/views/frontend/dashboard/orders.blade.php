@extends('frontend.layouts.app')

@section('dashboard-content')
<h3>My orders</h3>
<div class="table-responsive mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Order Date</th>
                <th scope="col">Total</th>
                <th scope="col">Payment Type</th>
                <th scope="col">Order Status</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">#{{$order->order_id}}</th>
                <td>{{$order->created_at->format('d-m-Y')}}</td>
                <td>{{$order->coupon_after_discount ?? $order->total}}</td>
                <td>{{$order->payment_type}}</td>
                <td>
                    @switch($order->order_status)
                    @case("pending")
                    <span class="badge badge-primary">Pending</span>
                    @break
                    @case("received")
                    <span class="badge badge-info">Recieved</span>
                    @break
                    @case("shipped")
                    <span class="badge badge-dark">Shipped</span>
                    @break
                    @case("returned")
                    <span class="badge badge-warning">Returned</span>
                    @break
                    @case("delivered")
                    <span class="badge badge-success">Delivered</span>
                    @break
                    @default
                    <span class="badge badge-danger">Cancel</span>
                    @endswitch
                </td>
                <td>
                    @switch($order->payment_status)
                    @case("received")
                    <span class="badge badge-primary">Recieved</span>
                    @break
                    @default
                    <span class="badge badge-danger">Pending</span>
                    @endswitch
                </td>
                <td>
                    <a href="{{route('dashboard.order.details', $order->id)}}" class="btn btn-sm btn-info">Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('style')
<style>
    .table td {
        vertical-align: baseline;
    }
</style>
@endpush
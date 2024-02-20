@extends('frontend.layouts.app')

@section('dashboard-content')
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card bg-warning">
            <div class="card-body text-center">
                <a href="" class="text-dark">Total Order</a>
                <p class="text-dark mb-0">{{$total}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success">
            <div class="card-body text-center">
                <a href="" class="text-white">Complete Order</a>
                <p class="text-white mb-0">{{$complete}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info">
            <div class="card-body text-center">
                <a href="" class="text-white">Return Order</a>
                <p class="text-white mb-0">{{$return}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-danger">
            <div class="card-body text-center">
                <a href="" class="text-white">Cancel Order</a>
                <p class="text-white mb-0">{{$cancel}}</p>
            </div>
        </div>
    </div>
</div>
{{-- Recent Order --}}
<div class="mt-3">
    <h3>Recent Orders</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Status</th>
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
                        @case("recieved")
                        <span class="badge badge-info">Recieved</span>
                        @break
                        @case("shipped")
                        <span class="badge badge-dark">Shipped</span>
                        @break
                        @case("returned")
                        <span class="badge badge-warning">Returned</span>
                        @break
                        @case("completed")
                        <span class="badge badge-success">Completed</span>
                        @break
                        @default
                        <span class="badge badge-danger">Cancel</span>
                        @endswitch
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
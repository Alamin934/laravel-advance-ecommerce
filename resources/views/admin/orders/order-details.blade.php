@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row d-flex justify-content-center align-items-center h-100 bg-white shadow-sm p-3 rounded">
    <div class="col-lg-12">
        <div class="d-flex flex-wrap justify-content-between">
            <h5 class="text-muted mb-0">Customer Name: <span class="text-primary">{{$order->customer_name}}</span>!
            </h5>
            <a href="{{route('order.index')}}" class="btn btn-primary">Back to Orders</a>
        </div>
        <div class="">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0 text-primary">Receipt</p>
            </div>
            @foreach ($order_details as $order_detail)
            <div class="card shadow-0 border mb-4">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-2">
                            <img src="{{asset('assets/admin/files/products/'.$order_detail->product->thumbnail)}}"
                                class="img-fluid" alt="Phone">
                        </div>
                        <div class="col-md-2 text-start d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0">{{substr($order_detail->product_name,0, 20)}}</p>
                        </div>
                        @if ($order_detail->color)
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small"><input type="color"
                                    value="{{rgbToHex($order_detail->color)}}"></p>
                        </div>
                        @endif

                        @if ($order_detail->size)
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">Size: {{$order_detail->size}}</p>
                        </div>
                        @endif

                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">Qty: <br> {{$order_detail->quantity." X
                                ".$order_detail->price}}
                            </p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">৳{{$order_detail->total_price}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0 fw-bold">Order Details</p>
                <p class="text-muted mb-0"><span class="fw-bold me-2">Total: </span> ৳{{$order->total}}</p>
            </div>

            <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0 fw-bold">Order Id : <span class="fw-normal">#{{$order->order_id}}</span>
                </p>
                <p class="text-muted mb-0"><span class="fw-bold me-2">Discount: </span> ৳{{$order->coupon_discount ??
                    '0.00'}}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0 fw-bold">Order Date : <span class="fw-normal">{{$order->created_at->format("d
                        M, Y")}}</span></p>
                <p class="text-muted mb-0"><span class="fw-bold me-2">Tax: </span> ৳{{$order->tax}}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0 fw-bold">Name : <span class="fw-normal">{{$order->customer_name}}</span></p>
                <p class="text-muted mb-0"><span class="fw-bold me-2">Delivery Charges:</span>
                    {{$order->shipping_charge==0 ? 'Free' : $order->shipping_charge}}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0 fw-bold">Phone : <span class="fw-normal">{{$order->customer_phone}}</span></p>
                {{-- @if ($order->payment_type != 'cash-on-delivery') --}}
                <p class="text-muted mb-0"><span class="fw-bold me-2">Payment method:</span>
                    {{strtoupper($order->payment_type)}}</p>
                {{-- @endif --}}
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0 fw-bold">Email : <span class="fw-normal">{{$order->customer_email}}</span></p>
                <p class="text-muted mb-0 fw-bold">Order Status : <span
                        class="badge text-bg-primary">{{$order->order_status}}</span>
                </p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0 fw-bold">Address : <span class="fw-normal">{{$order->address.' -
                        '.$order->city.' - '.$order->state}}</span>
                <p class="text-muted mb-0 fw-bold mt-1">Payment Status : <span
                        class="badge text-bg-primary">{{$order->payment_status}}</span>
                </p>
            </div>

        </div>
        @if ($order->payment_details)
        <div class="mt-3">
            <p class="fw-bold mb-0 fw-bold">Payment Details</p>
            <p class="text-muted mb-0"><span class="fw-bold me-2">Payment Status: </span>
                {{$order->payment_details->pay_status}}</p>
            <p class="text-muted mb-0"><span class="fw-bold me-2">Paid Amount: </span>
                {{$order->payment_details->amount}}</p>
            <p class="text-muted mb-0"><span class="fw-bold me-2">Payment Option: </span>
                {{$order->payment_details->payment_processor}}</p>
            <p class="text-muted mb-0"><span class="fw-bold me-2">Payment Date: </span>
                {{$order->payment_details->date_processed}}</p>
            <br>
            <p class="text-muted mb-0"><span class="fw-bold me-2">Admin Received: </span>
                {{$order->payment_details->rec_amount}}</p>
            <p class="text-muted mb-0"><span class="fw-bold me-2">Payment Method Charge: </span>
                {{$order->payment_details->processing_charge}}</p>
        </div>
        @endif
        <div class="card-footer border-0 mt-4 px-4 py-5 bg-primary">
            <h4 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">
                {{$order->payment_type == 'cash-on-delivery' ? 'Due' : 'Total Paid'}}:
                <span class="h2 mb-0 ms-3 text-white">
                    @if ($order->payment_type == 'cash-on-delivery')
                    <span style="font-size: 45px">৳</span>{{$order->coupon_after_discount ?? $order->total}}
                    @else
                    <span style="font-size: 45px">৳</span>{{$order->coupon_after_discount ?? $order->total}}
                    @endif
                    {{-- ৳{{$order->payment_type == 'cash-on-delivery' ?
                    $order->total : ($order->total ? $order->coupon_after_discount :
                    $order->total)}} --}}
                </span>
            </h4>
        </div>
    </div>
</div>
@endsection
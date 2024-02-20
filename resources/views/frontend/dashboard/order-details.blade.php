@extends('frontend.layouts.app')

@section('dashboard-content')
@php
function rgbToHex($color){
$color = str_replace(array('rgb(', ')'), '', $color);
$color = explode(',', $color);
$color = sprintf("#%02x%02x%02x",$color[0],$color[1],$color[2]);
return $color;
}
@endphp
<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-lg-12">
        <div class="d-flex flex-wrap justify-content-between">
            <h5 class="text-muted mb-0">Thanks for your Order, <span class="text-info">{{$order->customer_name}}</span>!
            </h5>
            <a href="{{route('dashboard.orders')}}" class="btn btn-info">Back to Orders</a>
        </div>
        <div class="">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0 text-info">Receipt</p>
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
            <div class="row px-3">
                <div class="col">
                    <ul id="progressbar">
                        <li class="step0 active" id="step1">PLACED</li>
                        <li class="step0 text-center" id="step2">SHIPPED</li>
                        <li class="step0 text-muted text-right" id="step3">DELIVERED</li>
                    </ul>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">Order Details</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> ৳{{$order->total}}</p>
            </div>

            <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Order Number : {{$order->order_id}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> ৳{{$order->coupon_discount ??
                    '0.00'}}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Order Date : {{$order->created_at->format("d M, Y")}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Tax: </span> ৳{{$order->tax}}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Name : {{$order->customer_name}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges:</span>
                    {{$order->shipping_charge==0 ? 'Free' : $order->shipping_charge}}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Phone : {{$order->customer_phone}}</p>
                {{-- @if ($order->payment_type != 'cash-on-delivery') --}}
                <p class="text-muted mb-0"><span class="fw-bold me-4">Payment method:</span>
                    {{strtoupper($order->payment_type)}}</p>
                {{-- @endif --}}
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Email : {{$order->customer_email}}</p>
                <p class="text-muted mb-0">Order Status : <span class="badge badge-info">{{$order->order_status}}</span>
                </p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Address : {{$order->address.' - '.$order->city.' - '.$order->state}}</p>
            </div>

        </div>
        <div class="card-footer border-0 mt-4 px-4 py-5 bg-info">
            <h4 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">
                {{$order->payment_type == 'cash-on-delivery' ? 'Due' : 'Total Paid'}}:
                <span class="h2 mb-0 ml-2">
                    @if ($order->payment_type == 'cash-on-delivery')
                    ৳{{$order->coupon_after_discount ?? $order->total}}
                    @else
                    ৳{{$order->coupon_after_discount ?? $order->total}}
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

@push('style')
<style>
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: #455A64;
        padding-left: 0px;
        margin-top: 30px
    }

    #progressbar li {
        list-style-type: none;
        font-size: 13px;
        width: 33.33%;
        float: left;
        position: relative;
        font-weight: 400;
        color: #455A64 !important;
        z-index: 1;
    }

    #progressbar #step1:before {
        content: "1";
        color: #fff;
        width: 29px;
        margin-left: 15px !important;
        padding-left: 11px !important;
    }


    #progressbar #step2:before {
        content: "2";
        color: #fff;
        width: 29px;

    }

    #progressbar #step3:before {
        content: "3";
        color: #fff;
        width: 29px;
        margin-right: 15px !important;
        padding-right: 11px !important;
    }

    #progressbar li:before {
        line-height: 29px;
        display: block;
        font-size: 12px;
        background: #455A64;
        border-radius: 50%;
        margin: auto;
    }

    #progressbar li:after {
        content: '';
        width: 121%;
        height: 2px;
        background: #455A64;
        position: absolute;
        left: 0%;
        right: 0%;
        top: 15px;
        z-index: -1;
    }

    #progressbar li:nth-child(2):after {
        left: 50%;
    }

    #progressbar li:nth-child(1):after {
        left: 25%;
        width: 121%;
    }

    #progressbar li:nth-child(3):after {
        left: 25% !important;
        width: 50% !important;
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #4bb8a9;
    }
</style>
@endpush
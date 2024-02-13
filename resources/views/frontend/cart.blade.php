@extends('layouts.app')

@section('main-nav')
@include('frontend.partials.collapse-main-navigation')
@endsection

@section('main-content')
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-9 col-md-8 mb-4 mb-md-0">
                <div class="card">
                    <div class="">
                        <h5 class="card-header">Cart - <span class="product_count">{{Cart::count()}}</span>
                            items</h5>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr align="center">
                                    <th>SL</th>
                                    <th style="text-align: start">Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if (count($cart)>0)
                                @foreach ($cart as $product)
                                <tr align="center">
                                    <td>{{$loop->iteration}}</td>
                                    <td align="start">
                                        <div>
                                            <img src="{{asset('admin/assets/files/products/'.$product->options->thumbnail)}}"
                                                alt="" class="me-3" style="height:40px;width:auto">
                                            <span class="font-weight-bold">
                                                {{Illuminate\Support\Str::words($product->name, 4, '')}}
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{$product->qty}}</td>
                                    <td>{{Illuminate\Support\Number::format($product->price)}}</td>
                                    <td class="font-weight-bold">
                                        {{Illuminate\Support\Number::format($product->qty*$product->price)}}</td>
                                    <td>
                                        {{-- <a href="{{route('single.product', $product->options->slug)}}"
                                            class="btn btn-primary btn-sm mb-2" title="See the full details of product">
                                            <i class="fas fa-eye"></i>
                                        </a> --}}
                                        <a href="javascript:void(0)" data-id=""
                                            class="btn btn-danger btn-sm me-1 mb-2 text-white delete"
                                            title="Remove from product">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <h3 class="text-center">product is Empty</h3>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="card">
                    <h5 class="card-header">Total Amount</h5>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th class="border-top-0">Tax: </th>
                                <td class="border-top-0">{{Cart::tax()}}</td>
                            </tr>
                            <tr>
                                <th>Dicount: </th>
                                <td>{{Cart::discount()}}</td>
                            </tr>
                            <tr>
                                <th>Sub Total: </th>
                                <td>{{Cart::total()}}</td>
                            </tr>
                            <tr>
                                <th>Total: </th>
                                <td class="font-weight-bold">{{Cart::total()}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="border-top-0">
                                    <button class="btn btn-primary d-block w-100">CheckOut</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/frontend') }}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/frontend') }}/styles/shop_responsive.css">
@endpush
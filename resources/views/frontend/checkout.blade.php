@extends('frontend.layouts.app')

@section('main-nav')
@include('frontend.partials.collapse-main-navigation')
@endsection

@section('main-content')
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row justify-content-end">
            <div class="col-md-9">
                <h3>Shipping Details</h3>
                <div class="shipping card-body shadow-sm border border-light mt-3">
                    <form method="POST" action="{{route('dashboard.place.order')}}">
                        @csrf
                        {{-- Email --}}
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{$shipping->email ?? ''}}">
                            @error('email')
                            <p class="text-danger mb-0">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-row">
                            {{-- Name --}}
                            <div class="form-group col-md-6">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    value="{{$shipping->name ?? ''}}">
                                @error('name')
                                <p class="text-danger mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone"
                                    value="{{$shipping->phone ?? ''}}">
                                @error('phone')
                                <p class="text-danger mb-0">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                                value="{{$shipping->address ?? ''}}">
                            @error('address')
                            <p class="text-danger mb-0">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="city">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{$shipping->city ?? ''}}">
                                @error('city')
                                <p class="text-danger mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="state">State <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="state" name="state"
                                    value="{{$shipping->state ?? ''}}">
                                @error('state')
                                <p class="text-danger mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="postal_code">Zip/Postal Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code"
                                    value="{{$shipping->postal_code ?? ''}}">
                                @error('postal_code')
                                <p class="text-danger mb-0">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="Bangladesh"
                                    @readonly(true)>
                            </div>
                        </div>
                        {{-- Payment options --}}
                        <div class="d-flex justify-content-between flex-wrap my-2">
                            <div class="form-check">
                                <input class="form-check-input form-check-inline" type="radio" name="payment"
                                    id="paypal" value="paypal">
                                <label class="form-check-label" for="paypal">Paypal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input form-check-inline" type="radio" name="payment"
                                    id="sslcommerze" value="sslcommerze">
                                <label class="form-check-label" for="sslcommerze">SSL Commerze</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input form-check-inline" type="radio" name="payment"
                                    id="aamarPay" value="aamarPay">
                                <label class="form-check-label" for="aamarPay">AamarPay</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input form-check-inline" type="radio" name="payment"
                                    id="cashOnDelivery" value="cash-on-delivery" checked>
                                <label class="form-check-label" for="cashOnDelivery">Cash On Delivery</label>
                            </div>
                            @error('payment')
                            <p class="text-danger mb-0">{{$message}}</p>
                            @enderror
                        </div>

                        <button class="btn btn-info mt-3">Place Order</button>
                    </form>
                </div>
            </div>
            {{-- Total Summery --}}
            <div class="col-md-3">
                <div class="card border-light shadow-sm">
                    <h5 class="card-header bg-white shadow-sm border-light m-2">Total Summery</h5>
                    <div class="card-body total_amount">
                        <table class="table">
                            <tr>
                                <th class="border-top-0">Tax: </th>
                                <td class="border-top-0">{{Cart::tax()}}</td>
                            </tr>
                            <tr>
                                <th>Dicount: </th>
                                <td>{{session()->get('coupon')['discount'] ?? Cart::discount()}}</td>
                            </tr>
                            <tr>
                                <th>Sub Total: </th>
                                <td>{{Cart::subTotal()}}</td>
                            </tr>
                            <tr>
                                <th>Total: </th>
                                <td class="font-weight-bold">{{session()->get('coupon')['after_discount'] ??
                                    Cart::total()}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="border-top-0 pt-3 px-0">
                                    @if (session()->missing('coupon'))
                                    <form id="coupon" method="get">
                                        @csrf
                                        <input type="text" class="form-control coupon-input" placeholder="Enter Coupon">
                                        <button type="submit" class="btn btn-info mt-2">Apply Coupon</button>
                                    </form>
                                    <span class="text-danger d-none coupon-err"></span>
                                    @else
                                    <button type="submit" id="remove-coupon" class="btn btn-info mt-2">Remove
                                        Coupon</button>
                                    @endif
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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/product_responsive.css">
@endpush
@push('scripts')
<script src="{{ asset('assets/frontend') }}/js/product_custom.js"></script>
<script>
    $(document).ready(function () {
        // Applied Coupon with ajax
        $(document).on('submit','#coupon', function (e) {
            e.preventDefault();
            let couponCode = $('.coupon-input').val();
            if(couponCode != ''){
                $('.coupon-err').html('').addClass('d-none');
                $.ajax({
                    type: "get",
                    url: "{{route('apply.coupon')}}",
                    data: {coupon_code:couponCode},
                    success: function (response) {
                        if(response.status == 'success'){
                            toastr.success(response.msg);
                            $('.total_amount').load(location.href + ' .table');
                            // $(".cart_price span").html('');
                            $(".cart_price span").html(response.total_price);
                        }else{
                            toastr.error(response.msg);
                        }
                    }
                });
            }else{
                $('.coupon-err').html('The field is required!').removeClass('d-none');
            }
        });
        // Removed Coupon with ajax
        $(document).on('click','#remove-coupon', function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "{{route('remove.coupon')}}",
                success: function (response) {
                    if(response.status == 'success'){
                        toastr.success(response.msg);
                        $('.total_amount').load(location.href + ' .table');
                       $(".cart_price span").html(response.total_price);
                    }
                }
            });
        });
    });
    // load data with ajax
    // function updateCartPageAfterChange(response){
    //     $('.table-responsive').load(location.href + ' .cart_table');
    //     $('.card-body').load(location.href + ' .total_amount');
        
    //     if(response.total_item && response.total_price){
    //         $(".cart_count span, .cart_price span").html('');
    //         $(".cart_count span").html(response.total_item);
    //         $(".cart_price span").html(response.total_price);
    //     }
    // }
    // // Cart update ajax call
    // function ajaxUpdateCartItems(url, data){
    //     $.ajax({
    //         type: "GET",
    //         url: url,
    //         data: data,
    //         success: function (response) {
    //             if(response.status == 'success'){
    //                 toastr.success(response.msg);
    //                 updateCartPageAfterChange(response);
    //             }
    //         }
    //     }); 
    // }

</script>
@endpush
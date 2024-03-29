@extends('frontend.layouts.app')

@section('main-nav')
@include('frontend.partials.collapse-main-navigation')
@endsection

@section('main-content')
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div>
            <h2>Shopping Cart</h2>
        </div>
        <div class="row justify-content-end mt-4">
            <div class="col-12 mb-4">
                <div class="card border-light shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <h5 class="card-header border-light bg-white shadow-sm">Cart - <span
                                    class="product_count">{{Cart::count()}}</span>
                                items</h5>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table border-0 cart_table">
                                {{-- <thead>
                                    <tr align="center">
                                        <th>SL</th>
                                        <th style="text-align: start">Title</th>
                                        <th>Quantity</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead> --}}
                                <tbody class="table-border-bottom-0">
                                    @if (count($cart)>0)
                                    @foreach ($cart as $product)
                                    @php
                                    $current_pd = \App\Models\Product::find($product->id);
                                    @endphp
                                    <tr align="center">
                                        {{-- <td>{{$loop->iteration}}</td> --}}
                                        <td align="start">
                                            <div class="d-flex">
                                                <img src="{{asset('assets/admin/files/products/'.$current_pd->thumbnail)}}"
                                                    alt="" class="mr-3" style="height:80px;width:auto">
                                                <div>
                                                    <span class="font-weight-bold">
                                                        {{Illuminate\Support\Str::words($product->name, 4, '')}}
                                                    </span>
                                                    <br>
                                                    <span>Brand:
                                                        <a
                                                            href="{{$current_pd->brand ? route('linkWise.product', ['id'=>$current_pd->brand->id, 'link'=>'brand']) : 'javascript:void(0)'}}">
                                                            {{ $current_pd->brand ? $current_pd->brand->name : 'No
                                                            Brand' }}
                                                        </a>
                                                    </span>
                                                    <br>
                                                    <span>Category:
                                                        <a
                                                            href="{{route('linkWise.product', ['id'=>$current_pd->category->id, 'link'=>'category'])}}">{{$current_pd->subCategory
                                                            ? $current_pd->category->name.' >' :
                                                            $current_pd->category->name}}
                                                        </a>
                                                        <a
                                                            href="{{route('linkWise.product', ['id'=>$current_pd->subCategory->id ?? ' ', 'link'=>'sub_category'])}}">
                                                            {{$current_pd->childCategory ?
                                                            $current_pd->subCategory->name.'
                                                            >'
                                                            :
                                                            ($current_pd->subCategory ? $current_pd->subCategory->name :
                                                            '')}}
                                                        </a>
                                                        <a
                                                            href="{{route('linkWise.product', ['id'=>$current_pd->childCategory->id ?? ' ', 'link'=>'child_category'])}}">
                                                            {{$current_pd->childCategory->name
                                                            ?? ''}}
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="width: 100px">
                                            <input style="height: 50px" data-id="{{$product->rowId}}" type="number"
                                                class="update_qty form-control text-center" value="{{$product->qty}}"
                                                min="1" name="qty">
                                        </td>
                                        <td>
                                            @if($current_pd->size)
                                            <select class="update_size form-control" name="size"
                                                style="width: 100px;height:50px" data-id="{{$product->rowId}}">
                                                <option selected disabled>Nothing Selected</option>
                                                <option {{$product->options->size == "M" ? 'selected' : ''}} value="M">M
                                                </option>
                                                <option {{$product->options->size == "L" ? 'selected' : ''}} value="L">L
                                                </option>
                                                <option {{$product->options->size == "XL" ? 'selected' : ''}}
                                                    value="XL">XL
                                                </option>
                                                <option {{$product->options->size == "XLL" ? 'selected' : ''}}
                                                    value="XLL">XLL</option>
                                                @for ($s=2; $s<=12; $s+=2) <option {{$product->options->size == 30+$s
                                                    ? 'selected' : ''}} value="{{30+$s}}">{{30+$s}}</option>
                                                    @endfor
                                            </select>
                                            @else
                                            <small class="btn btn-info p-1">No Size</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($current_pd->color)
                                            <ul class="product_color mt-0" style="width: 110px!important">
                                                <li style="padding-left:10px; padding-right:25px;">
                                                    <span>Color: </span>
                                                    <div class="color_mark_container">
                                                        <div name="product_color" class="selected_color color_mark"
                                                            style="background-color: {{$product->options->color}};">
                                                        </div>
                                                    </div>
                                                    <div class="color_dropdown_button" style="width:20px;"><i
                                                            class="fas fa-chevron-down"></i>
                                                    </div>

                                                    <ul class="color_list">
                                                        @foreach ($current_pd->color as $color)
                                                        <li>
                                                            <div data-id="{{$product->rowId}}"
                                                                class="update_color color_mark" name="color"
                                                                style="background: {{$color}};"></div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <small class="text-danger"
                                                    style="margin-left: -50px;">{{$product->options->color ? '' :
                                                    'Nothing
                                                    Selceted'}}</small>
                                            </ul>
                                            @else
                                            <small class="btn btn-info p-1">No Color</small>
                                            @endif
                                        </td>
                                        <td>{{Illuminate\Support\Number::format($product->price)." X ".$product->qty}}
                                        </td>
                                        <td class="font-weight-bold">
                                            {{Illuminate\Support\Number::format($product->qty*$product->price)}}</td>
                                        <td>
                                            <a href="{{route('single.product',$current_pd->slug)}}"
                                                class="btn btn-info mb-2 text-white"
                                                title="See the full details of product">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="javascript:void(0)" data-id="{{$product->rowId}}"
                                                class="btn btn-danger me-1 mb-2 text-white delete_cart_item"
                                                title="Remove from product">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr align="center">
                                        <td colspan="6">
                                            <h3>Cart is Empty</h3>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <!-- Order Total -->
                <div class="order_total">
                    <div class="order_total_content text-md-right">
                        <div class="order_total_title">Order Total:</div>
                        <div class="order_total_amount">৳<span>{{Cart::total()}}</span></div>
                    </div>
                </div>

                <div class="cart_buttons">
                    <button type="button" class="button cart_button_clear" @if(count($cart)==0)
                        @disabled(true)@endif>Empty Cart</button>
                    <a href="{{route('checkout')}}" class="button cart_button_checkout">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@push('style')
<style>
    td {
        border-top: 0 !important;
        padding-bottom: 35px !important;
        vertical-align: middle !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/cart_responsive.css">
@endpush
@push('scripts')
<script src="{{ asset('assets/frontend') }}/js/cart_custom.js"></script>
<script>
    // load data with ajax
    function updateCartPageAfterChange(response){
        $('.table-responsive').load(location.href + ' .cart_table');
        // $('.card-body').load(location.href + ' .total_amount');
        
        if(response.total_item && response.total_price){
            $(".cart_count span, .cart_price span").html('');
            $(".cart_count span, .product_count").html(response.total_item);
            $(".cart_price span, .order_total_amount span").html(response.total_price);
        }
    }
    // Cart update ajax call
    function ajaxUpdateCartItems(url, data){
        $.ajax({
            type: "GET",
            url: url,
            data: data,
            success: function (response) {
                if(response.status == 'success'){
                    toastr.success(response.msg);
                    updateCartPageAfterChange(response);
                }
            }
        }); 
    }
    $(document).ready(function () {
        // Cart Quantity Update
        $(document).on('click','.update_qty',function(){
            let rowId = $(this).data('id');
            let qty = $(this).val();
            ajaxUpdateCartItems("/update-qty/"+rowId, {'qty':qty});
        });      
        // Cart Color UPdate
        $(document).on('click','.update_color',function(){
            let rowId = $(this).data('id');
            let size = $(this).parents('tr').find('.update_size').val();
            let color = $(this).css('backgroundColor');
            ajaxUpdateCartItems("/update-color/"+rowId, {'size':size,'color':color});
        });       
        // Cart Size Update
        $(document).on('change','.update_size',function(){
            let rowId = $(this).data('id');
            let color = $(this).parents('tr').find(".selected_color").css('backgroundColor');
            let size = $(this).val();
            ajaxUpdateCartItems("/update-size/"+rowId, {'size':size,'color':color});
        });
               
        if($('.cart_button_clear').is(':disabled')){
            $('.cart_button_clear').addClass('text-light bg-secondary').css('cursor','not-allowed');
        }
        // Cart Empty
        $(document).on('click','.cart_button_clear',function(e){
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('empty.cart')}}",
                        success: function (response) {
                            if(response.status == 'success'){
                                toastr.success(response.msg);
                                $('.table-responsive').load(location.href + ' .cart_table').fadeIn();
                                $(".cart_count span, .cart_price span").html('');
                                $(".cart_count span, .product_count").html(response.total_item);
                                $(".cart_price span, .order_total_amount span").html(response.total_price);
                                $('.cart_button_clear').prop('disabled',true).addClass('bg-secondary text-light').css('cursor','not-allowed');
                            }
                        }
                    }); 
                }
            }); 
        });       

        // Delete Item From Cart
        $(document).on('click','.delete_cart_item', function (e) {
            e.preventDefault();
            let rowId = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // ajaxUpdateCartItems("/remove-from-cart/"+rowId, null);
                    $.ajax({
                        type: "GET",
                        url: "/remove-from-cart/"+rowId,
                        data: null,
                        success: function (response) {
                            if(response.status == 'success'){
                                toastr.success(response.msg);
                                $('.table-responsive').load(location.href + ' .cart_table');
                                // $('.card-body').load(location.href + ' .total_amount');

                                $(".cart_count span, .cart_price span").html('');
                                $(".cart_count span, .product_count").html(response.total_item);
                                $(".cart_price span, .order_total_amount span").html(response.total_price);
                            }
                        }
                    }); 
                }
            });
        });
    });
</script>
@endpush
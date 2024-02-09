@extends('layouts.app')

@section('main-nav')
@include('frontend.partials.collapse-main-navigation')
@endsection

@section('main-content')
<!-- Single Product -->
<div class="single_product">
    <div class="container">
        <div class="row">
            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-1 order-2">
                <div class="image_selected">
                    <img src="{{asset('admin/assets/files/products/'.$product->thumbnail)}}" alt="">
                </div>
                <div>
                    <!-- Images -->
                    <ul class="image_list">
                        <li data-image="{{asset('admin/assets/files/products/'.$product->thumbnail)}}">
                            <img src="{{asset('admin/assets/files/products/'.$product->thumbnail)}}" alt="">
                        </li>
                        @foreach ($product->images as $image)
                        <li data-image="{{asset('admin/assets/files/products/'.$image)}}">
                            <img src="{{asset('admin/assets/files/products/'.$image)}}" alt="">
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Description -->
            <div class="col-lg-4 col-6 order-3">
                <div class="product_description">
                    <div class="product_category">
                        {{$product->category->name}} >
                        {{$product->subCategory->name}} >
                        {{$product->childCategory ? $product->childCategory->name : ''}}
                    </div>
                    <div class="product_name">{{$product->title}}</div>
                    <p class="mb-0"><span class="text-dark">Stock:</span> {{$product->stock_quantity}}</p>
                    <p><span class="text-dark">Brand:</span> {{$product->brand ? $product->brand->brand_name
                        : 'No Brand'}}</p>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                                class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                                class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>

                                <!-- Product Color -->
                                @if ($product->color)
                                <ul class="product_color">
                                    <li>
                                        <span>Color: </span>
                                        <div class="color_mark_container">
                                            <div id="selected_color" class="color_mark"></div>
                                        </div>
                                        <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                                        <ul class="color_list">
                                            <li>
                                                <div class="color_mark" style="background: #999999;"></div>
                                            </li>
                                            <li>
                                                <div class="color_mark" style="background: #b19c83;"></div>
                                            </li>
                                            <li>
                                                <div class="color_mark" style="background: #000000;"></div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                @endif

                            </div>

                            @if ($product->selling_price)
                            <div>
                                <strike
                                    class="text-danger d-inline-block">${{\Illuminate\Support\Number::format($product->purchase_price)}}</strike>
                                <span
                                    class="product_price">${{\Illuminate\Support\Number::format($product->selling_price)}}</span>
                            </div>
                            @else
                            <div class="product_price">
                                ${{\Illuminate\Support\Number::format($product->selling_price)}}
                            </div>
                            @endif
                            <div class="button_container">
                                <button type="button" class="button cart_button">Add to Cart</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 order-4 delivery_product" style="border-left: 1px solid #a1a1a1">
                <div>
                    <h4 class="fw-semibold">Delivery Details:</h4>
                    <p>-> (4-5) days after placed order.</p>
                    <p>-> Cash on Delivery available.</p>
                </div>
                <div class="mt-4">
                    <h4 class="fw-semibold">Return & Warrenty:</h4>
                    <p>-> 7 days return guarranty.</p>
                    <p>-> Warrenty not available.</p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 px-0">
                <div class="product_text card">
                    <div class="card-header">
                        <h5 class="mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
                        {!!$product->description!!}
                    </div>
                </div>
            </div>
            <div class="col-12 px-0">
                <div class="product_text card">
                    <div class="card-header">
                        <h5 class="mb-0">Product Reviews</h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Recently Viewed</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('admin/frontend')}}/images/view_1.jpg"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('admin/frontend')}}/images/view_2.jpg"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('admin/frontend')}}/images/view_3.jpg"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225</div>
                                    <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('admin/frontend')}}/images/view_4.jpg"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('admin/frontend')}}/images/view_5.jpg"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div
                                class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('admin/frontend')}}/images/view_6.jpg"
                                        alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$375</div>
                                    <div class="viewed_name"><a href="#">Speedlink...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Brands -->

<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">

                    <!-- Brands Slider -->

                    <div class="owl-carousel owl-theme brands_slider">

                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{asset('admin/frontend')}}/images/brands_1.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{asset('admin/frontend')}}/images/brands_2.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{asset('admin/frontend')}}/images/brands_3.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{asset('admin/frontend')}}/images/brands_4.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{asset('admin/frontend')}}/images/brands_5.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{asset('admin/frontend')}}/images/brands_6.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{asset('admin/frontend')}}/images/brands_7.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{asset('admin/frontend')}}/images/brands_8.jpg" alt=""></div>
                        </div>

                    </div>

                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
<link rel="stylesheet" type="text/css"
    href="{{ asset('admin/frontend') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/frontend') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/frontend') }}/styles/product_responsive.css">
@endpush

@push('scripts')
<script src="{{ asset('admin/frontend') }}/js/product_custom.js"></script>
@endpush
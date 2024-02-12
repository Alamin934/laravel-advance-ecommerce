@extends('layouts.app')

@section('main-nav')
@include('frontend.partials.main-navigation')
@endsection

@section('main-content')
<!-- Banner -->
<div class="banner">
    <div class="banner_background" style="background-image:url({{'admin/frontend/'}}images/banner_background.jpg)">
    </div>
    <div class="container fill_height">
        <div class="row fill_height">
            <div class="banner_product_image"><img src="{{ asset('admin/assets/files/products/'.$banner->thumbnail) }}"
                    alt="">
            </div>
            <div class="col-lg-5 offset-lg-4 fill_height">
                <div class="banner_content">
                    <h1 class="banner_text">{{$banner->title}}</h1>
                    @if ($banner->selling_price)
                    <div class="banner_price">
                        <span>${{\Illuminate\Support\Number::format($banner->purchase_price)}}</span>${{\Illuminate\Support\Number::format($banner->selling_price)}}
                    </div>
                    @else
                    <div class="banner_price">
                        ${{\Illuminate\Support\Number::format($banner->selling_price)}}
                    </div>
                    @endif
                    <div class="banner_product_name">{{$banner->brand->brand_name}}</div>
                    <div class="button banner_button"><a href="{{route('single.product',$banner->slug)}}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Characteristics -->
<div class="characteristics">
    <div class="container">
        <div class="row">

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('admin/frontend') }}/images/char_1.png" alt="">
                    </div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('admin/frontend') }}/images/char_2.png" alt="">
                    </div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('admin/frontend') }}/images/char_3.png" alt="">
                    </div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('admin/frontend') }}/images/char_4.png" alt="">
                    </div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deals of the week -->
<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->
                <div class="deals">
                    <div class="deals_title">Deals of the Week</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">

                            <!-- Deals Item -->
                            <div class="owl-item deals_item">
                                <div class="deals_image"><img src="{{ asset('admin/frontend') }}/images/deals.png"
                                        alt=""></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="#">Headphones</a></div>
                                        <div class="deals_item_price_a ml-auto">$300</div>
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name">Beoplay H7</div>
                                        <div class="deals_item_price ml-auto">$225</div>
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Available: <span>6</span></div>
                                            <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:17%"></span></div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Hurry Up</div>
                                            <div class="deals_timer_subtitle">Offer ends in:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                    <span>hours</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                    <span>mins</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                    <span>secs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Deals Item -->
                            <div class="owl-item deals_item">
                                <div class="deals_image"><img src="{{ asset('admin/frontend') }}/images/deals.png"
                                        alt=""></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="#">Headphones</a></div>
                                        <div class="deals_item_price_a ml-auto">$300</div>
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name">Beoplay H7</div>
                                        <div class="deals_item_price ml-auto">$225</div>
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Available: <span>6</span></div>
                                            <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:17%"></span></div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Hurry Up</div>
                                            <div class="deals_timer_subtitle">Offer ends in:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer2_hr" class="deals_timer_hr"></div>
                                                    <span>hours</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer2_min" class="deals_timer_min"></div>
                                                    <span>mins</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer2_sec" class="deals_timer_sec"></div>
                                                    <span>secs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Deals Item -->
                            <div class="owl-item deals_item">
                                <div class="deals_image"><img src="{{ asset('admin/frontend') }}/images/deals.png"
                                        alt=""></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="#">Headphones</a></div>
                                        <div class="deals_item_price_a ml-auto">$300</div>
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name">Beoplay H7</div>
                                        <div class="deals_item_price ml-auto">$225</div>
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Available: <span>6</span></div>
                                            <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:17%"></span></div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Hurry Up</div>
                                            <div class="deals_timer_subtitle">Offer ends in:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer3_hr" class="deals_timer_hr"></div>
                                                    <span>hours</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer3_min" class="deals_timer_min"></div>
                                                    <span>mins</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer3_sec" class="deals_timer_sec"></div>
                                                    <span>secs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                        </div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                        </div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Featured</li>
                                <li>Most Popolar</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Featured Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">
                                <!-- Slider Item -->
                                @foreach ($featureds as $featured)
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div
                                        class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <a href="{{route('single.product', $featured->slug)}}">
                                                <img src="{{ asset('admin/assets/files/products/'.$featured->thumbnail) }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_price discount">
                                                @if ($featured->selling_price)
                                                ${{\Illuminate\Support\Number::format($featured->selling_price)}}
                                                <span>${{\Illuminate\Support\Number::format($featured->purchase_price)}}</span>
                                                @else
                                                ${{\Illuminate\Support\Number::format($featured->purchase_price)}}
                                                @endif
                                            </div>
                                            <div class="product_name">
                                                <div><a href="{{route('single.product', $featured->slug)}}">{{\Illuminate\Support\Str::words($featured->title,
                                                        2) }}</a></div>
                                            </div>
                                            <div class="product_extras">
                                                @if ($featured->color)
                                                <div class="product_color">
                                                    <input type="radio" checked name="product_color"
                                                        style="background:#b19c83">
                                                    <input type="radio" name="product_color" style="background:#000000">
                                                    <input type="radio" name="product_color" style="background:#999999">
                                                </div>
                                                @endif
                                                <button class="product_cart_button">Add to Cart</button>
                                            </div>
                                        </div>
                                        @auth
                                        <div class="product_fav" data-id="{{$featured->id}}" title="Add to Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                        @endauth
                                        {{-- <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul> --}}
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Most Popular Product Panel -->
                        <div class="product_panel panel">
                            <div class="featured_slider slider">
                                <!-- Slider Item -->
                                @foreach ($most_populars as $most_popular)
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div
                                        class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <a href="{{route('single.product', $most_popular->slug)}}">
                                                <img src="{{ asset('admin/assets/files/products/'.$most_popular->thumbnail) }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_price discount">
                                                @if ($most_popular->selling_price)
                                                ${{\Illuminate\Support\Number::format($most_popular->selling_price)}}
                                                <span>${{\Illuminate\Support\Number::format($most_popular->purchase_price)}}</span>
                                                @else
                                                ${{\Illuminate\Support\Number::format($most_popular->purchase_price)}}
                                                @endif
                                            </div>
                                            <div class="product_name">
                                                <div><a href="{{route('single.product', $most_popular->slug)}}">{{\Illuminate\Support\Str::words($most_popular->title,
                                                        2) }}</a></div>
                                            </div>
                                            <div class="product_extras">
                                                @if ($most_popular->color)
                                                <div class="product_color">
                                                    <input type="radio" checked name="product_color"
                                                        style="background:#b19c83">
                                                    <input type="radio" name="product_color" style="background:#000000">
                                                    <input type="radio" name="product_color" style="background:#999999">
                                                </div>
                                                @endif
                                                <button class="product_cart_button">Add to Cart</button>
                                            </div>
                                        </div>
                                        @auth
                                        <div class="product_fav" data-id="{{$most_popular->id}}"
                                            title="Add to Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                        @endauth
                                        {{-- <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul> --}}
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Popular Categories -->
<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Popular Categories</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i
                                class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i
                                class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                    <div class="popular_categories_link"><a href="#">full
                            catalog</a></div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">
                        <!-- Popular Categories Item -->
                        @foreach ($categories as $category)
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img
                                        src="{{ asset('admin/assets/files/category/'.$category->icon) }}" alt="">
                                </div>
                                <div class="popular_category_text">{{$category->name}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner -->
<div class="banner_2">
    <div class="banner_2_background" style="background-image:url({{'admin/frontend/'}}images/banner_2_background.jpg)">
    </div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <!-- Banner 2 Slider -->

        <div class="owl-carousel owl-theme banner_2_slider">

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating">
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                    </div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img
                                            src="{{ asset('admin/frontend') }}/images/banner_2_product.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating">
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                    </div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img
                                            src="{{ asset('admin/frontend') }}/images/banner_2_product.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating">
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                        <i class="fas fa-star text-warning m-1"></i>
                                    </div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img
                                            src="{{ asset('admin/frontend') }}/images/banner_2_product.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Hot New Arrivals -->
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Hot New Arrivals</div>
                        <ul class="clearfix">
                            @foreach ($new_arrivals as $new_arrival)
                            <li class="{{$loop->iteration == 1 ? 'active' : '' }}">@if (count($new_arrival->products)>0)
                                {{$new_arrival->name}} @endif</li>
                            @endforeach
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9" style="z-index:1;">

                            <!-- Product Panel -->
                            @foreach ($new_arrivals as $new_arrival)
                            <div class="product_panel panel {{$loop->iteration == 1 ? 'active' : '' }}">
                                <div class="arrivals_slider slider">
                                    <!-- Slider Item -->
                                    @foreach ($new_arrival->products as $product)
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div
                                            class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            <div
                                                class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <a href="{{route('single.product', $product->slug)}}">
                                                    <img src="{{ asset('admin/assets/files/products/'.$product->thumbnail) }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price discount">
                                                    @if ($product->selling_price)
                                                    ${{\Illuminate\Support\Number::format($product->selling_price)}}
                                                    <span>${{\Illuminate\Support\Number::format($product->purchase_price)}}</span>
                                                    @else
                                                    ${{\Illuminate\Support\Number::format($product->purchase_price)}}
                                                    @endif
                                                </div>
                                                <div class="product_name">
                                                    <div><a href="{{route('single.product', $product->slug)}}">{{\Illuminate\Support\Str::words($product->title,
                                                            2) }}</a></div>
                                                </div>
                                                <div class="product_extras">
                                                    @if ($product->color)
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color"
                                                            style="background:#b19c83">
                                                        <input type="radio" name="product_color"
                                                            style="background:#000000">
                                                        <input type="radio" name="product_color"
                                                            style="background:#999999">
                                                    </div>
                                                    @endif
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </div>
                                            @auth
                                            <div class="product_fav" data-id="{{$product->id}}" title="Add to Wishlist">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            @endauth
                                            {{-- <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>
                            @endforeach
                        </div>
                        {{-- Hot Arrivals Single --}}
                        <div class="col-lg-3">
                            <div class="arrivals_single clearfix">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <div class="arrivals_single_image"><img
                                            src="{{ asset('admin/assets/files/products/'.$banner->thumbnail) }}" alt="">
                                    </div>
                                    <div class="arrivals_single_content">
                                        <div class="arrivals_single_category"><a
                                                href="#">{{$banner->category->name}}</a></div>
                                        <div class="arrivals_single_name_container clearfix">
                                            <div class="arrivals_single_name"><a
                                                    href="{{route('single.product', $banner->slug)}}">{{\Illuminate\Support\Str::words($banner->title,
                                                    2)}}</a>
                                            </div>
                                            <div class="arrivals_single_price text-right">
                                                ${{\Illuminate\Support\Number::format($banner->selling_price) ??
                                                \Illuminate\Support\Number::format($banner->purchase_price)}}</div>
                                        </div>
                                        <div class="rating_r rating_r_4 arrivals_single_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <form action="#"><button class="arrivals_single_button">Add to
                                                Cart</button></form>
                                    </div>
                                    @auth
                                    <div class="product_fav" data-id="{{$featured->id}}" title="Add to Wishlist">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    @endauth
                                    <ul class="arrivals_single_marks product_marks">
                                        <li class="arrivals_single_mark product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Best Sellers -->
<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Hot Best Sellers</div>
                        <ul class="clearfix">
                            <li class="active">Top 20</li>
                            <li>Audio & Video</li>
                            <li>Laptops & Computers</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>

                    <div class="bestsellers_panel panel active">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_1.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_2.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Samsung
                                                J730F...</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_3.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Nomi Black
                                                White</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_4.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Samsung Charm
                                                Gold</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_5.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Beoplay H7</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_6.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Huawei
                                                MediaPad
                                                T3</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_1.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_2.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_3.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_4.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_5.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_6.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_1.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_2.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_3.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_4.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_5.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_6.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_1.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_2.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_3.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_4.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_5.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_6.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_1.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_2.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_3.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_4.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_5.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_6.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_1.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_2.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_3.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_4.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_5.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('admin/frontend') }}/images/best_6.png" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Xiaomi Redmi
                                                Note
                                                4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Adverts -->
<div class="adverts">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a>
                        </div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.
                        </div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img src="{{ asset('admin/frontend') }}/images/adv_1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_subtitle">Trends 2018</div>
                        <div class="advert_title_2"><a href="#">Sale -45%</a>
                        </div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img src="{{ asset('admin/frontend') }}/images/adv_2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a>
                        </div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img src="{{ asset('admin/frontend') }}/images/adv_3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Trends -->
<div class="trends">
    <div class="trends_background" style="background-image:url({{'admin/frontend/'}}/images/trends_background.jpg)">
    </div>
    <div class="trends_overlay"></div>
    <div class="container">
        <div class="row">

            <!-- Trends Content -->
            <div class="col-lg-3">
                <div class="trends_container">
                    <h2 class="trends_title">Trends 2018</h2>
                    <div class="trends_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                    </div>
                    <div class="trends_slider_nav">
                        <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                </div>
            </div>

            <!-- Trends Slider -->
            <div class="col-lg-9">
                <div class="trends_slider_container">

                    <!-- Trends Slider -->

                    <div class="owl-carousel owl-theme trends_slider">

                        <!-- Trends Slider Item -->
                        <div class="owl-item">
                            <div class="trends_item is_new">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('admin/frontend') }}/images/trends_1.jpg" alt="">
                                </div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="#">Smartphones</a></div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Jump White</a>
                                        </div>
                                        <div class="trends_price">$379</div>
                                    </div>
                                </div>
                                <ul class="trends_marks">
                                    <li class="trends_mark trends_discount">-25%</li>
                                    <li class="trends_mark trends_new">new</li>
                                </ul>
                                <div class="trends_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>

                        <!-- Trends Slider Item -->
                        <div class="owl-item">
                            <div class="trends_item">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('admin/frontend') }}/images/trends_2.jpg" alt="">
                                </div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="#">Smartphones</a></div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Samsung
                                                Charm...</a>
                                        </div>
                                        <div class="trends_price">$379</div>
                                    </div>
                                </div>
                                <ul class="trends_marks">
                                    <li class="trends_mark trends_discount">-25%</li>
                                    <li class="trends_mark trends_new">new</li>
                                </ul>
                                <div class="trends_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>

                        <!-- Trends Slider Item -->
                        <div class="owl-item">
                            <div class="trends_item is_new">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('admin/frontend') }}/images/trends_3.jpg" alt="">
                                </div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="#">Smartphones</a></div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">DJI Phantom
                                                3...</a>
                                        </div>
                                        <div class="trends_price">$379</div>
                                    </div>
                                </div>
                                <ul class="trends_marks">
                                    <li class="trends_mark trends_discount">-25%</li>
                                    <li class="trends_mark trends_new">new</li>
                                </ul>
                                <div class="trends_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>

                        <!-- Trends Slider Item -->
                        <div class="owl-item">
                            <div class="trends_item is_new">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('admin/frontend') }}/images/trends_1.jpg" alt="">
                                </div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="#">Smartphones</a></div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Jump White</a>
                                        </div>
                                        <div class="trends_price">$379</div>
                                    </div>
                                </div>
                                <ul class="trends_marks">
                                    <li class="trends_mark trends_discount">-25%</li>
                                    <li class="trends_mark trends_new">new</li>
                                </ul>
                                <div class="trends_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>

                        <!-- Trends Slider Item -->
                        <div class="owl-item">
                            <div class="trends_item">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('admin/frontend') }}/images/trends_2.jpg" alt="">
                                </div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="#">Smartphones</a></div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Jump White</a>
                                        </div>
                                        <div class="trends_price">$379</div>
                                    </div>
                                </div>
                                <ul class="trends_marks">
                                    <li class="trends_mark trends_discount">-25%</li>
                                    <li class="trends_mark trends_new">new</li>
                                </ul>
                                <div class="trends_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>

                        <!-- Trends Slider Item -->
                        <div class="owl-item">
                            <div class="trends_item is_new">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('admin/frontend') }}/images/trends_3.jpg" alt="">
                                </div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="#">Smartphones</a></div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name"><a
                                                href="{{ asset('admin/frontend') }}/product.html">Jump White</a>
                                        </div>
                                        <div class="trends_price">$379</div>
                                    </div>
                                </div>
                                <ul class="trends_marks">
                                    <li class="trends_mark trends_discount">-25%</li>
                                    <li class="trends_mark trends_new">new</li>
                                </ul>
                                <div class="trends_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Reviews -->
<div class="reviews">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="reviews_title_container">
                    <h3 class="reviews_title">Latest Reviews</h3>
                    <div class="reviews_all ml-auto"><a href="#">view all
                            <span>reviews</span></a></div>
                </div>

                <div class="reviews_slider_container">

                    <!-- Reviews Slider -->
                    <div class="owl-carousel owl-theme reviews_slider">

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('admin/frontend') }}/images/review_1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Roberto Sanchez</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            fermentum laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('admin/frontend') }}/images/review_2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Brandon Flowers</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            fermentum laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('admin/frontend') }}/images/review_3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Emilia Clarke</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            fermentum laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('admin/frontend') }}/images/review_1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Roberto Sanchez</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            fermentum laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('admin/frontend') }}/images/review_2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Brandon Flowers</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            fermentum laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('admin/frontend') }}/images/review_3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Emilia Clarke</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                            <i class="fas fa-star text-warning m-1"></i>
                                        </div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            fermentum laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="reviews_dots"></div>
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
                        @foreach ($recent_views as $recent_view)
                        <div class="owl-item">
                            <div
                                class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image">
                                    <a href="{{route('single.product', $recent_view->slug)}}">
                                        <img src="{{ asset('admin/assets/files/products/'.$recent_view->thumbnail) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">
                                        @if ($recent_view->selling_price)
                                        ${{\Illuminate\Support\Number::format($recent_view->selling_price)}}
                                        <span>${{\Illuminate\Support\Number::format($recent_view->purchase_price)}}</span>
                                        @else
                                        ${{\Illuminate\Support\Number::format($recent_view->purchase_price)}}
                                        @endif
                                    </div>
                                    <div class="viewed_name">
                                        <a href="{{route('single.product', $recent_view->slug)}}">{{\Illuminate\Support\Str::words($recent_view->title,
                                            2) }}</a>
                                    </div>
                                </div>
                                {{-- <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul> --}}
                            </div>
                        </div>
                        @endforeach

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
                        @foreach ($brands as $brand)
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center">
                                <a href="" title="{{$brand->brand_name}}">
                                    <img style="width:120px"
                                        src="{{ asset('admin/assets/files/brands/'.$brand->brand_logo) }}" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach


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

@endpush
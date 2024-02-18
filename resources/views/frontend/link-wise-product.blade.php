@extends('layouts.app')

@section('main-nav')
@include('frontend.partials.collapse-main-navigation')
@endsection

@section('main-content')

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll"
        data-image-src="{{ asset('assets/frontend') }}/images/shop_background.jpg">
    </div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">{{$link->name}}</h2>
    </div>
</div>

<!-- Shop -->
<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories cat_menu">
                            @foreach ($categories as $category)
                            @if(count($category->products)>0)
                            <li class="{{count($category->sub_categories) == 0 ? '' : 'hassubs'}}">
                                <a href="{{route('linkWise.product', ['id'=>$category->id, 'link'=>'category'])}}">
                                    {{ $category->name }}
                                    <span
                                        class="badge badge-pill badge-primary font-weight-normal">{{count($category->products)}}</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                                <ul>
                                    @foreach ($category->sub_categories as $sub_category)

                                    <li class="{{count($sub_category->ChildCategory) == 0 ? '' : 'hassubs'}}">
                                        <a href="{{route('linkWise.product', ['id'=>$sub_category->id, 'link'=>'sub_category'])}}">{{$sub_category->name}}
                                            {{-- <span
                                                class="badge badge-pill badge-primary font-weight-normal">{{count($sub_category->products)}}</span>
                                            --}}
                                            <i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            @foreach ($sub_category->ChildCategory as $child_category)

                                            <li>
                                                <a href="{{route('linkWise.product', ['id'=>$child_category->id, 'link'=>'child_category'])}}">{{$child_category->name}}
                                                    {{-- <span
                                                        class="badge badge-pill badge-primary font-weight-normal">{{count($child_category->products)}}</span>
                                                    --}}
                                                    <i class="fas fa-chevron-right"></i></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly
                                    style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle color_subtitle">Color</div>
                        <ul class="colors_list">
                            <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                            <li class="color"><a href="#" style="background: #000000;"></a></li>
                            <li class="color"><a href="#" style="background: #999999;"></a></li>
                            <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                            <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                            <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            @foreach ($brands as $brand)
                            @if(count($brand->products) > 0)
                            <li class="brand"><a
                                    href="{{route('linkWise.product', ['id'=>$brand->id, 'link'=>'brand'])}}">{{$brand->name}}<span
                                        style="padding-top: 5px;"
                                        class="badge badge-pill badge-primary font-weight-normal small ml-2">{{count($brand->products)}}</span></a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{count($products)}}</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button"
                                            data-isotope-option='{ "sortBy": "original-order" }'>highest rated
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>
                                            price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid">
                        <div class="product_grid_border"></div>
                        @foreach ($products as $product)
                        <!-- Product Item -->
                        <div class="product_item is_new">
                            <div class="product_border"></div>
                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                <img src="{{ asset('assets/admin/files/products/'.$product->thumbnail) }}" alt="">
                            </div>
                            <div class="product_content">
                                @if($product->selling_price)
                                <div class="product_price">
                                    <small
                                        class="font-weight-normal d-block"><del>${{$product->purchase_price}}</del></small>
                                    ${{$product->selling_price}}
                                </div>
                                @else
                                <div class="product_price">${{$product->purchase_price}}</div>
                                @endif
                                <div class="product_name">
                                    <div><a href="{{route('single.product',$product->slug)}}"
                                            tabindex="0">{{substr($product->title, 0, 18)}}</a></div>
                                </div>
                            </div>
                            <div class="product_fav" data-id="{{$product->id}}"><i class="fas fa-heart"></i></div>
                            <ul class="product_marks">
                                <li class="product_mark product_discount">-25%</li>
                                <li class="product_mark product_new">new</li>
                            </ul>
                        </div>
                        @endforeach
                    </div>

                    <!-- Shop Page Navigation -->
                    <div>
                        {{$products->links()}}
                    </div>
                    {{-- <div class="shop_page_nav d-flex flex-row">
                        <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i
                                class="fas fa-chevron-left"></i></div>
                        <ul class="page_nav d-flex flex-row">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">21</a></li>
                        </ul>
                        <div class="page_next d-flex flex-column align-items-center justify-content-center"><i
                                class="fas fa-chevron-right"></i></div>
                    </div> --}}

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Recently Viewed -->
@include('frontend.partials.recently-viewed')

<!-- Brands -->
@include('frontend.partials.brands')

@endsection

@push('style')
<style>
    .sidebar_categories li {
        padding-left: 0px !important;
        padding-right: 15px !important;
        margin-bottom: 0 !important;
    }

    .sidebar_categories li ul {
        top: 46px !important;
        left: 15% !important;
        z-index: 9999;
        padding-left: 15px !important;
    }

    .sidebar_categories li ul li ul {
        z-index: 9999;
    }

    .product_image img {
        max-width: 95% !important;
    }
</style>
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/frontend') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/shop_responsive.css">
@endpush

@push('scripts')
<script src="{{ asset('assets/frontend') }}/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{ asset('assets/frontend') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="{{ asset('assets/frontend') }}/plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{ asset('assets/frontend') }}/js/shop_custom.js"></script>
@endpush
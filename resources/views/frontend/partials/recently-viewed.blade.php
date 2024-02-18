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
                                        <img src="{{ asset('assets/admin/files/products/'.$recent_view->thumbnail) }}"
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
{{-- @if(!request()->routeIs('dashboard.*')) --}}
<!-- Top Bar -->
<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item">
                    <div class="top_bar_icon"><img src="{{ asset('assets/frontend') }}/images/phone.png" alt=""></div>
                    +38
                    068 005 3570
                </div>
                <div class="top_bar_contact_item">
                    <div class="top_bar_icon"><img src="{{ asset('assets/frontend') }}/images/mail.png" alt=""></div>
                </div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Italian</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Japanese</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">EUR Euro</a></li>
                                    <li><a href="#">GBP British Pound</a></li>
                                    <li><a href="#">JPY Japanese Yen</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="top_bar_user">
                        @auth
                        <div>
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a href="javascript:void(0)">{{auth()->user()->name}}</a>
                                    <ul>
                                        <li>
                                            @if (request()->routeIs('dashboard.*'))
                                            <a href="{{route('home')}}"><i
                                                    class="fas fa-home mr-2 d-inline-block"></i>Home</a>
                                            @else
                                            <a href="{{route('dashboard.dashboard')}}"><i
                                                    class="fas fa-home mr-2 d-inline-block"></i>Dashboard</a>
                                            <a href="{{route('dashboard.orders')}}"><i
                                                    class="fas fa-clipboard mr-2 d-inline-block"></i>My
                                                Order</a>
                                            <a href="{{route('dashboard.profile.edit')}}"><i
                                                    class="fas fa-user mr-2 d-inline-block"></i>Profile</a>
                                            <a href="{{route('dashboard.settings')}}"><i
                                                    class="fas fa-edit mr-2 d-inline-block"></i>Settings</a>

                                            <form action="{{route('logout')}}" method="post" class="home-logout">
                                                @csrf
                                                <button type="submit" class="btn bg-transparent border-0 py-2 px-0"
                                                    style="font-weight: 300">
                                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                                    <span class="align-middle">Log Out</span>
                                                </button>
                                            </form>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        @endauth
                        @guest
                        <div class="user_icon"><img src="{{ asset('assets/frontend') }}/images/user.svg" alt=""></div>
                        <div><a href="{{route('register')}}">Register</a></div>
                        <div><a href="javascript:void(0)" id="singIn">Sign in</a></div>
                        @endguest
                    </div>
                    {{-- Header Top Login Form --}}
                    <div class="card singInForm d-none" style="width: 350px">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-row w-100 mr-0">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-row w-100 mr-0">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-row w-100 mr-0 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label" for="exampleCheck1">{{ __('Remember
                                        me')
                                        }}</label>
                                </div>
                                <div class="w-100 mr-0">
                                    @if (Route::has('password.request'))
                                    <a class="text-primary" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                            <div class="mt-3">
                                <a href="{{route('google.auth.redirect')}}" class="btn btn-info text-white"
                                    style="line-height: 31px!important;">Login with Google</a>
                            </div>
                        </div>
                    </div>
                    {{-- Header Top Login Form End --}}

                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endif --}}
<!-- Header Main -->
<div class="header_main">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="{{route('home')}}">OneTech</a></div>
                </div>
            </div>

            <!-- Search -->
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            <form action="#" class="header_search_form clearfix">
                                <input type="search" required="required" class="header_search_input"
                                    placeholder="Search for products...">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">All Categories</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            @foreach ($categories as $category)
                                            <li class="mb-0"><a class="clc"
                                                    href="{{route('linkWise.product', ['id'=>$category->id, 'link'=>'category'])}}">{{$category->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300" value="Submit"><img
                                        src="{{ asset('assets/frontend') }}/images/search.png" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wishlist -->
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist_icon"><img src="{{ asset('assets/frontend') }}/images/heart.png" alt="">
                            @php
                            $wishlist_count = \App\Models\Wishlist::where('user_id', Auth::id())->count();
                            @endphp
                            <div class="wishlist_count"><span class="text-white">{{$wishlist_count}}</span></div>
                        </div>
                        <div class="wishlist_content">
                            <div class="wishlist_text"><a href="{{route('show.wishlist')}}">Wishlist</a></div>
                        </div>
                    </div>

                    <!-- Cart -->
                    <div class="cart">
                        <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                            <div class="cart_icon">
                                <img src="{{ asset('assets/frontend') }}/images/cart.png" alt="">
                                <div class="cart_count"><span>{{Cart::count()}}</span></div>
                            </div>
                            <div class="cart_content">
                                <div class="cart_text">
                                    <a href="{{route('display.cart')}}">Cart</a>
                                </div>
                                <div class="cart_price">৳<span>{{Cart::total()}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section>
    <div class="container border-bottom py-5">
        <div class="row">
            {{-- Left Sidebar --}}
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">Welcome, {{auth()->user()->name}}</div>
                    <div class="card-body">
                        {{-- User Profile Image --}}
                        <div class="text-center mt-3 mb-5">
                            <img class="img-fluid rounded-circle" src="{{asset('assets/admin/img/avatars/1.png')}}"
                                alt="{{auth()->user()->name}}">
                        </div>
                        {{-- Nav --}}
                        <div>
                            <ul class="nav flex-column">
                                <li class="nav-item border-top">
                                    <a class="nav-link text-dark" href="{{route('dashboard.dashboard')}}"><i
                                            class="fas fa-home mr-2"></i>Dashboard</a>
                                </li>
                                <li class="nav-item border-top">
                                    <a class="nav-link text-dark" href="{{route('show.wishlist')}}"><i
                                            class="far fa-heart mr-2"></i>Wishlist</a>
                                </li>
                                <li class="nav-item border-top">
                                    <a class="nav-link text-dark" href="{{route('dashboard.orders')}}"><i
                                            class="fas fa-clipboard mr-2"></i>My
                                        Order</a>
                                </li>
                                <li class="nav-item border-top">
                                    <a class="nav-link text-dark" href="{{route('dashboard.profile.edit')}}"><i
                                            class="fas fa-edit mr-2"></i>Settings</a>
                                </li>
                                <li class="nav-item border-top">
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button class="nav-link text-dark bg-transparent border-0"
                                            style="cursor: pointer" type="submit"><i
                                                class="fas fa-sign-out-alt mr-2"></i>Log
                                            Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Dashboard Content --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @yield('dashboard-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
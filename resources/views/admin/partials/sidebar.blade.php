<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    {{-- Dashboard Logo --}}
    <div class="app-brand demo">
        <a href="{{route('admin.dashboard')}}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">E-Commerce</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    {{-- Menu Start --}}
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{request()->routeIs('admin.dashboard') ? 'active' : ''}}">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
                {{-- <div class="badge bg-danger rounded-pill ms-auto">5</div> --}}
            </a>
        </li>
        <!-- Products -->
        <li class="menu-item {{request()->routeIs('product.*') ? 'active open' : ''}}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Products</div>
            </a>
            <ul class="menu-sub ">
                <li class="menu-item {{request()->routeIs('product.index') ? 'active' : ''}}">
                    <a href="{{route('product.index')}}" class="menu-link">
                        <div data-i18n="All Products">All Products</div>
                    </a>
                </li>
                <li class="menu-item {{request()->routeIs('product.create') ? 'active' : ''}}">
                    <a href="{{route('product.create')}}" class="menu-link">
                        <div data-i18n="Add Product">Add Product</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Category -->
        <li
            class="menu-item {{request()->routeIs('category.*') || request()->routeIs('subCategory.*') || request()->routeIs('childCategory.*') ? 'active open' : ''}}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Category</div>
            </a>
            <ul class="menu-sub ">
                <li class="menu-item {{request()->routeIs('category.*') ? 'active' : ''}}">
                    <a href="{{route('category.index')}}" class="menu-link">
                        <div data-i18n="Category">Category</div>
                    </a>
                </li>
                <li class="menu-item {{request()->routeIs('subCategory.*') ? 'active' : ''}}">
                    <a href="{{route('subCategory.index')}}" class="menu-link">
                        <div data-i18n="subCategory">Sub Category</div>
                    </a>
                </li>
                <li class="menu-item {{request()->routeIs('childCategory.*') ? 'active' : ''}}">
                    <a href="{{route('childCategory.index')}}" class="menu-link">
                        <div data-i18n="subCategory">Child Category</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Brands -->
        <li class="menu-item {{request()->routeIs('brand.*') ? 'active open' : ''}}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Brands">Brands</div>
            </a>

            <ul class="menu-sub ">
                <li class="menu-item {{request()->routeIs('brand.index') ? 'active' : ''}}">
                    <a href="{{route('brand.index')}}" class="menu-link">
                        <div data-i18n="Category">Brands List</div>
                    </a>
                </li>
                <li class="menu-item {{request()->routeIs('brand.create') ? 'active' : ''}}">
                    <a href="{{route('brand.create')}}" class="menu-link">
                        <div data-i18n="subCategory">Add New Brand</div>
                    </a>
                </li>
            </ul>
        </li>
        @if (Auth::user()->hasRole('admin'))
        <!-- Users -->
        <li class="menu-item {{request()->routeIs('user.*') ? 'active open' : ''}}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Users">Users</div>
            </a>

            <ul class="menu-sub ">
                <li class="menu-item {{request()->routeIs('user.index') ? 'active' : ''}}">
                    <a href="{{route('user.index')}}" class="menu-link">
                        <div data-i18n="Category">All Users</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Roles -->
        <li class="menu-item {{request()->routeIs('role.*') ? 'active open' : ''}}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Roles">Roles</div>
            </a>

            <ul class="menu-sub ">
                <li class="menu-item {{request()->routeIs('role.index') ? 'active' : ''}}">
                    <a href="{{route('role.index')}}" class="menu-link">
                        <div data-i18n="Category">All Roles</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <!-- Offers -->
        <li class="menu-item {{request()->routeIs('coupon.*') ? 'active open' : ''}}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Brands">Offers</div>
            </a>

            <ul class="menu-sub ">
                <li class="menu-item {{request()->routeIs('coupon.index') ? 'active' : ''}}">
                    <a href="{{route('coupon.index')}}" class="menu-link">
                        <div data-i18n="Coupon">Coupon</div>
                    </a>
                </li>
            </ul>
        </li>
        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('moderator'))
        <!-- Orders -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Orders</span></li>
        <!-- Orders interface -->
        <li class="menu-item {{request()->routeIs('order.*') ? 'active open' : ''}}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Orders</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{request()->routeIs('order.index') ? 'active' : ''}}">
                    <a href="{{route('order.index')}}" class="menu-link">
                        <div data-i18n="All Orders">All Orders</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->hasRole('admin'))
        <!-- Settings -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Settings</span></li>
        <!-- User interface -->
        <li class="menu-item {{request()->routeIs('setting.*') ? 'active open' : ''}}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Seo">Seo</div>
                    </a>
                </li>
                <li class="menu-item {{request()->routeIs('setting.smtp.index') ? 'active' : ''}}">
                    <a href="{{route('setting.smtp.index')}}" class="menu-link">
                        <div data-i18n="Smtp">Smtp</div>
                    </a>
                </li>
                <li class="menu-item {{request()->routeIs('setting.bd.payment.getway') ? 'active' : ''}}">
                    <a href="{{route('setting.bd.payment.getway')}}" class="menu-link">
                        <div data-i18n="Payment Getway">Payment Getway</div>
                    </a>
                </li>
            </ul>
        </li>

        @endif
        {{--
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
        <!-- User interface -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">User interface</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="ui-accordion.html" class="menu-link">
                        <div data-i18n="Accordion">Accordion</div>
                    </a>
                </li>
            </ul>
        </li> --}}

    </ul>
</aside>
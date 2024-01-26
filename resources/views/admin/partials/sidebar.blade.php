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
        <!-- Category -->
        <li class="menu-item {{request()->routeIs('category.index') ? 'active open' : ''}}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Category</div>
            </a>
            <ul class="menu-sub ">
                <li class="menu-item {{request()->routeIs('category.index') ? 'active' : ''}}">
                    <a href="{{route('category.index')}}" class="menu-link">
                        <div data-i18n="Category">Category</div>
                    </a>
                </li>
                <li class="menu-item {{request()->routeIs('subCategory.index') ? 'active' : ''}}">
                    <a href="{{route('subCategory.index')}}" class="menu-link">
                        <div data-i18n="subCategory">Sub Category</div>
                    </a>
                </li>
            </ul>
        </li>

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
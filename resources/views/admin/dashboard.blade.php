@extends('admin.layout.admin-layout')

@section('main-content')

<div class="row">
    <div class="col-lg-12 col-md-12 order-1">
        {{-- Dashboard Items --}}
        <div class="row">
            {{-- Total Orders --}}
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/admin') }}/img/icons/unicons/chart-success.png"
                                    alt="chart success" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="{{route('product.index')}}">View
                                        More</a>
                                    {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                                </div>
                            </div>
                        </div>
                        <span class="fw-medium d-block mb-1">Total Products</span>
                        <h3 class="card-title mb-4">{{$products}}</h3>
                        {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i>
                            +72.80%</small> --}}
                    </div>
                </div>
            </div>
            {{-- Total Category --}}
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/admin') }}/img/icons/unicons/wallet-info.png"
                                    alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="{{route('category.index')}}">View Category</a>
                                    <a class="dropdown-item" href="{{route('subCategory.index')}}">View Sub Category</a>
                                    <a class="dropdown-item" href="{{route('childCategory.index')}}">View Child
                                        Category</a>
                                </div>
                            </div>
                        </div>
                        <span>Total Category</span>
                        <h3 class="card-title text-wrap d-flex mt-2">
                            {{$category}}
                            <small style="font-size: 12px;" class="ms-2 text-success fw-medium"><i
                                    class="bx bx-left-arrow-alt"></i>Category, Sub
                                Category
                                and Child Category</small>
                        </h3>
                    </div>
                </div>
            </div>
            {{-- Total Brands --}}
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/admin') }}/img/icons/unicons/wallet-info.png"
                                    alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="{{route('brand.index')}}">View
                                        More</a>
                                    {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                                </div>
                            </div>
                        </div>
                        <span>Total Brands</span>
                        <h3 class="card-title text-nowrap mb-4">{{$brands}}</h3>
                        {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i>
                            +28.42%</small> --}}
                    </div>
                </div>
            </div>
            {{-- Total Users --}}
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/admin') }}/img/icons/unicons/wallet-info.png"
                                    alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="{{route('user.index')}}">View
                                        More</a>
                                    {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                                </div>
                            </div>
                        </div>
                        <span>Total Customer</span>
                        <h3 class="card-title text-nowrap mb-4">{{$users}}</h3>
                        {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i>
                            +28.42%</small> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Order Statistics -->
    <div class="col-md-6 col-lg-8 col-xl-8 order-0 mb-4">
        <div class="card h-100">
            <div class="row m-4 h-100">
                <div class="col-md-6 ps-0">
                    <div class="card" style="height: 70%; margin-bottom:5%;">
                        <div class="card-body bg-primary-subtle rounded d-flex flex-column justify-content-between">
                            <div>
                                <h1 class="text-primary mb-0">{{$total_orders}}</h1>
                                <span class="fw-medium d-block">Total Orders</span>
                            </div>
                            <a class="btn btn-primary d-block" href="{{route('order.index')}}">All Orders</a>

                        </div>
                    </div>
                    <div class="card h-25">
                        <div class="card-body bg-danger rounded d-flex justify-content-between align-items-center">
                            <span class="fw-normal d-block text-white"><i class='bx bx-time-five fs-4 me-1'></i>Pending
                                Orders</span>
                            <h3 class="text-white fw-normal mb-0">
                                {{$pending}}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 pe-0">
                    <div class="h-100 d-flex flex-column justify-content-between">
                        <div class="card py-2 mb-3 bg-info-subtle">
                            <div class="card-body rounded d-flex justify-content-between align-items-center">
                                <span class="fw-normal d-block text-dark"><i
                                        class='bx bx-time-five fs-2 me-2 text-success'></i>Received
                                    Orders</span>
                                <h3 class="text-success fw-normal mb-0">
                                    {{$received}}</h3>
                            </div>
                        </div>
                        <div class="card py-2 mb-3 bg-success-subtle">
                            <div class="card-body rounded d-flex justify-content-between align-items-center">
                                <span class="fw-normal d-block text-dark"><i
                                        class='bx bx-time-five fs-2 me-2 text-info'></i>Deliverd
                                    Orders</span>
                                <h3 class="text-info fw-normal mb-0"> {{$deliverd}}</h3>
                            </div>
                        </div>
                        <div class="card py-2 mb-3 bg-danger-subtle">
                            <div class="card-body rounded d-flex justify-content-between align-items-center">
                                <span class="fw-normal d-block text-dark"><i
                                        class='bx bx-time-five fs-2 me-2 text-danger'></i>Returned
                                    Orders</span>
                                <h3 class="text-danger fw-normal mb-0"> {{$returned}}</h3>
                            </div>
                        </div>
                        <div class="card py-2 bg-warning-subtle">
                            <div class="card-body rounded d-flex justify-content-between align-items-center">
                                <span class="fw-normal d-block text-dark"><i
                                        class='bx bx-time-five fs-2 me-2 text-warning'></i>Shipped
                                    Orders</span>
                                <h3 class="text-warning fw-normal mb-0"> {{$shipped}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Order Statistics -->
    <!-- Transactions -->
    <div class="col-md-6 col-lg-4 order-2 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Transactions</h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/admin') }}/img/icons/unicons/paypal.png" alt="User"
                                class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Paypal</small>
                                <h6 class="mb-0">Amount</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">0.00</h6>
                                <span class="text-muted">BDT</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/admin') }}/img/icons/unicons/wallet.png" alt="User"
                                class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Cash On Delivery</small>
                                <h6 class="mb-0">Amount</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+{{$cashOnDelivey}}</h6>
                                <span class="text-muted">BDT</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/admin') }}/img/icons/unicons/wallet.png" alt="User"
                                class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">AamarPay</small>
                                <h6 class="mb-0">Amount</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+{{$aamarPay}}</h6>
                                <span class="text-muted">BDT</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/admin') }}/img/icons/unicons/chart.png" alt="User"
                                class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Refund</small>
                                <h6 class="mb-0">Amount</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">0.00</h6>
                                <span class="text-muted">BDT</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/admin') }}/img/icons/unicons/cc-success.png" alt="User"
                                class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Credit Card</small>
                                <h6 class="mb-0">Amount</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">0.00</h6>
                                <span class="text-muted">BDT</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ Transactions -->
</div>

@endsection
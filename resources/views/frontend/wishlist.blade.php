@extends('layouts.app')

@section('main-nav')
@include('frontend.partials.collapse-main-navigation')
@endsection

@section('main-content')
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Wishlist - <span class="wishlist_count">{{count($wishlist_product)}}</span>
                            items</h5>
                    </div>
                    <div class="card-body table">
                        @if (count($wishlist_product)>0)
                        @foreach ($wishlist_product as $wishlist)
                        <!-- Single item -->
                        <div class="row">
                            <div class="col-lg-2 align-self-center col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                    data-mdb-ripple-color="light">
                                    <img src="{{asset('admin/assets/files/products/'.$wishlist->product->thumbnail)}}"
                                        class="w-100" alt="{{ $wishlist->product->title }}" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                    </a>
                                </div>
                                <!-- Image -->
                            </div>

                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                <!-- Data -->
                                <p><strong>{{ $wishlist->product->title }}</strong></p>
                                <p>Brand: {{ $wishlist->product->brand ? $wishlist->product->brand->brand_name : 'No
                                    Brand' }}</p>
                                <p>Category:
                                    {{$wishlist->product->category->name.' > '.$wishlist->product->subCategory->name}}
                                </p>
                                <!-- Data -->
                            </div>

                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                <div class="d-lg-flex d-block justify-content-between">
                                    <!-- Price -->
                                    @if ($wishlist->product->selling_price)
                                    <div class="text-start">
                                        <strike>${{\Illuminate\Support\Number::format($wishlist->product->purchase_price)}}</strike>
                                        <strong>${{\Illuminate\Support\Number::format($wishlist->product->selling_price)}}</strong>
                                    </div>
                                    @else
                                    <div class="text-start">
                                        ${{\Illuminate\Support\Number::format($wishlist->product->selling_price)}}
                                    </div>
                                    @endif
                                    <!-- Price -->
                                    <div class="mt-lg-0 mt-3">
                                        <a href="{{route('single.product', $wishlist->product->slug)}}"
                                            class="btn btn-primary btn-sm mb-2" title="See the full details of product">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm mb-2 text-white"
                                            title="Added to the cart">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-id="{{$wishlist->id}}"
                                            class="btn btn-danger btn-sm me-1 mb-2 text-white delete"
                                            title="Remove from wishlist">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single item -->
                        <hr class="my-4" />
                        @endforeach
                        @else
                        <h3 class="text-center">Wishlist is Empty</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('style')
<link rel="stylesheet" type="text/css"
    href="{{ asset('admin/frontend') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/frontend') }}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/frontend') }}/styles/shop_responsive.css">
@endpush
@push('scripts')
<script>
    function ajaxDeleteWithToastr(method, url, data, toastrMsg) {
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
                    type: method,
                    url: url,
                    data: data,
                    success: function (response) {
                        if (response.status == 'success') {
                            $('.wishlist_count').html('');
                            $('.wishlist_count').html(response.wishlist_count);
                            $('.table').load(location.href + ' .table');
                            toastr.success(toastrMsg);
                        }
                    }
                });
            }
        });
    }

    $(document).on('click', '.delete', function(){
        let wishlist_id = $(this).data('id');
        ajaxDeleteWithToastr("GET", "/remove-to-wishlist/"+wishlist_id, null, 'Product has been remove from Wishlist.');
    })
</script>
@endpush
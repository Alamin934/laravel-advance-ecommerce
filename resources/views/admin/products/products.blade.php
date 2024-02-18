@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Product List</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card products">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Product</h5>
                <div class="pe-3">
                    <a href="{{route('product.create')}}" class="btn btn-primary p-2">+Add New
                        Product</a>
                </div>
            </div>
            <div class="card">
                <div class="row mb-3 px-3">
                    <div class="col">
                        <label class="form-label">Categories</label>
                        <select name="filter_cat" class="form-select product_filter">
                            <option value="all">All</option>
                            @foreach (\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Brands</label>
                        <select name="filter_brand" class="form-select product_filter">
                            <option value="all">All</option>
                            @foreach (\App\Models\Brand::all() as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Status</label>
                        <select name="filter_status" class="form-select product_filter">
                            <option value="all">All</option>
                            <option value="on">Active</option>
                            <option value="">InActive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub Cat</th>
                            <th>Child Cat</th>
                            <th>InStock</th>
                            <th>Banner</th>
                            <th>Slider</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 t-body">
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{asset('assets/admin/files/products/'.$product->thumbnail)}}" alt=""
                                    class="me-3" style="height:40px;width:auto">
                                {{Illuminate\Support\Str::words($product->title, 4, '')}}
                            </td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->selling_price ?? $product->purchase_price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{$product->subCategory->name ?? ''}}</td>
                            <td>{{$product->childCategory->name ?? ''}}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input data-id="{{$product->id}} {{$product->home_banner}}"
                                        class="form-check-input home_banner" type="checkbox" role="switch"
                                        {{$product->home_banner == 'on' ?
                                    'checked' : 'disabled'}} />
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input data-id="{{$product->id}} {{$product->home_slider}}"
                                        class="form-check-input home_slider" type="checkbox" role="switch"
                                        {{$product->home_slider == 'on' ?
                                    'checked' : ''}} />
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input data-id="{{$product->id}} {{$product->featured}}"
                                        class="form-check-input featured" type="checkbox" role="switch"
                                        {{$product->featured == 'on' ?
                                    'checked' : ''}}>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input data-id="{{$product->id}} {{$product->status}}"
                                        class="form-check-input status" type="checkbox" role="switch" {{$product->status
                                    == 'on' ? 'checked' : ''}} >
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('single.product', $product->slug)}}" class="btn btn-info p-2 me-2">
                                        <i class='bx bx-low-vision'></i>
                                    </a>

                                    <!-- Button trigger Edit Modal -->
                                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary p-2 me-2">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger deleteProduct p-2"
                                        data-id="{{$product->id}}">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-5 mt-4">
                {{ $products->links() }}
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        // Delete Product with Ajax
        $(document).on('click','.deleteProduct', function () {
            let product_id = $(this).data('id');
            ajaxDeleteWithToastr("DELETE", "{{url('admin/product/{product_id}')}}", {id:product_id}, "Product Deleted Successfully");
        });
        
        // Product Filtering
        $(document).on('change','.product_filter', function(){
            let cat_id = $('.product_filter[name="filter_cat"]').val();
            let brand_id = $('.product_filter[name="filter_brand"]').val();
            let status = $('.product_filter[name="filter_status"]').val();
            $.ajax({
                type: "POST",
                url: "{{route('product.filter')}}",
                data: {cat_id:cat_id, brand_id:brand_id, status:status},
                success: function (response) {
                    $('.t-body').html(response);
                }
            });
        });

        // Update Featured without Reload
        $(document).on('change', '.featured', function() {
            let featured = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "/admin/product/changeFeatured/"+featured,
                data: featured,
                success: function (response) {
                    $('.products').load(location.href+' .products');
                    toastr.success(response.status);
                }
            });
        });
        
        
        // Update Product Status without Reload
        $(document).on('change', '.status', function() {
            let status = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "/admin/product/changeStatus/"+status,
                data: status,
                success: function (response) {
                    $('.products').load(location.href+' .products');
                    toastr.success(response.status);
                }
            }); 
        });
    });
</script>
@endpush
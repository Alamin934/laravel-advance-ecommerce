@extends('admin.layout.admin-layout')

@section('main-content')
{{-- Add Product Start --}}
<div class="mt-3">
    <!-- card -->
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between">
            <h5 class="card-title">Add Product</h5>
            <div class="pe-3">
                <a href="{{route('product.index')}}" class="btn btn-primary p-2">See Products</a>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" id="product-upload">
            {{-- <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data"> --}}
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <div class="card p-3">
                                {{-- Product Title --}}
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label">Product Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{old('title')}}" name="title" class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Product Code --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Product Code <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{old('code')}}" name="code" class="form-control" />
                                    </div>
                                    {{-- Product Unit --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Product Unit</label>
                                        <input type="text" value="{{old('unit')}}" name="unit" class="form-control" />
                                    </div>
                                    {{-- Product Tags --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Product Tags</label>
                                        <input type="text" value="{{old('tags')}}" name="tags" class="form-control" />
                                    </div>
                                </div>
                                {{-- Categories & Brand --}}
                                <div class="row">
                                    {{-- Category --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Category<span class="text-danger">*</span></label>
                                        <select type="text" name="category" class="form-select">
                                            <option disabled selected>Select...</option>
                                            @foreach ($categories as $category)
                                            <option class="catOpt" value="{{$category->id}}">
                                                {{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col mb-3 sub_category" style="display: none">
                                        <label class="form-label">SubCategory</label>
                                        <select type="text" name="sub_category" class="form-select">
                                            {{-- <option disabled selected>Select...</option> --}}
                                            {{-- @foreach ($categories as $category)
                                            @foreach ($category->sub_categories as $subCategory)
                                            <option class="subCatOpt" value="{{$subCategory->id}}">
                                                {{$subCategory->name}}</option>
                                            @endforeach
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    {{-- ChildCategory --}}
                                    <div class="col mb-3 child_category" style="display: none">
                                        <label class="form-label">ChildCategory</label>
                                        <select type="text" name="child_category" class="form-select">
                                            {{-- <option disabled selected>Select...</option> --}}
                                            {{--@foreach ($childCategories as $childCategory)
                                            <option value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                            @endforeach--}}
                                        </select>
                                    </div>
                                    {{-- Brands --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Brands</label>
                                        <select type="text" name="brand" class="form-select">
                                            <option disabled value="" selected>Select...</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Prices --}}
                                <div class="row">
                                    {{-- Purchase Price --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Purchase Price <span
                                                class="text-danger">*</span></label>
                                        <input type="number" value="{{old('purchase_price')}}" name="purchase_price"
                                            class="form-control" />
                                    </div>
                                    {{-- Selling Price --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Selling Price</label>
                                        <input type="number" value="{{old('selling_price')}}" name="selling_price"
                                            class="form-control" />
                                    </div>
                                    {{-- Discount Price --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Discount Price</label>
                                        <input type="number" value="{{old('discount_price')}}" name="discount_price"
                                            class="form-control" />
                                    </div>
                                    {{-- Stock Quantity --}}
                                    <div class="col mb-3">
                                        <label class="form-label">In Stock <span class="text-danger">*</span></label>
                                        <input type="number" value="{{old('stock_quantity')}}" name="stock_quantity"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea class="rounded-0" id="editor-textarea" name="description"></textarea>
                                    </div>

                                    <div class="col-12 mt-5 pt-5">
                                        <label class="form-label">Video Embeded Code</label>
                                        <textarea name="video" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-12 card p-3">
                                    <label class="form-label">Product Thumbnail</label>
                                    <input type="file" name="thumbnail" class="dropify" />

                                    {{-- Product Gallery --}}
                                    <div class="mt-3">
                                        <label class="form-label">Product Gallery</label>
                                        <input type="file" class="form-control" name="images[]" multiple />
                                    </div>
                                </div>
                                {{-- Color --}}
                                <div class="col-12 mt-4 card p-3">
                                    <label class="form-label mt-1">Colors</label>
                                    <div class="d-flex flex-wrap colors">

                                        <button type="button" title="Add your colors"
                                            class="btn btn-primary btn-sm add_color">
                                            <i class='bx bx-plus'></i>
                                        </button>
                                    </div>
                                    <small class="text-danger">You can select one or many colors</small>
                                </div>
                                {{-- Size --}}
                                <div class="col-12 mt-4 card p-3">
                                    <label class="form-label mt-1">Size</label>
                                    <select name="size[]" class="form-select" size="4" multiple>
                                        <option selected disabled>Nothing Selected</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XLL">XLL</option>
                                        @for ($s=2; $s<=12; $s+=2) <option value="{{30+$s}}">{{30+$s}}</option>
                                            @endfor
                                    </select>
                                    <small class="text-danger">You can select one or many Size</small>
                                </div>
                                {{-- Home Banner --}}
                                <div class="col-12 mt-4 card p-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            name="home_banner">
                                        <label class="form-check-label fw-semibold mt-1 ms-3" for="home_banner">Home
                                            Banner</label>
                                    </div>
                                    <small class="text-danger">You can set Only one product on Banner</small>
                                </div>
                                {{-- Home Slider --}}
                                <div class="col-12 mt-4 card p-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            name="home_slider">
                                        <label class="form-check-label fw-semibold mt-1 ms-3" for="home_slider">Home
                                            Slider</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4 card p-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="featured">
                                        <label class="form-check-label fw-semibold mt-1 ms-3"
                                            for="featured">Featured</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4 card p-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="status">
                                        <label class="form-check-label fw-semibold mt-1 ms-3"
                                            for="status">Status</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer pt-0">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // display sub category when category is selected
    dependedSelect("select[name='category']", '/dependedSubCategory/', "select[name='sub_category']", ".sub_category");
    // display child category when sub category is selected
    dependedSelect("select[name='sub_category']", '/dependedChildCategory/', "select[name='child_category']", ".child_category");

    $(document).ready(function () {
        // Set border color after select color
        $(document).on('change', '.form-control-color', function () {
            $(this).addClass('border border-info');
        });

        // add new color after click
        $(document).on('click', '.add_color', function (e) {
            e.preventDefault();
            $(this).parent('.colors').prepend(`<div class="color position-relative me-2 my-3">
                <input class="form-control form-control-color" type="color" name="color[]"/>
            
                <button type="button" class="btn btn-danger p-0 remove_color">
                    <i class='bx bx-x'></i>
                </button>
            </div>`);
        });
        $(document).on('click', '.remove_color', function (e) {
            e.preventDefault();
            $(this).parent('.color').remove();
        });
    });

</script>
@endpush
@extends('admin.layout.admin-layout')

@section('main-content')
{{-- Add Product Start --}}
<div class="mt-3">
    <!-- card -->
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between">
            <h5 class="card-title">Edit Product</h5>
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

        <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data"
            id="product-upload">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <div class="card p-3">
                            {{-- Product Title --}}
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label class="form-label">Product Title <span class="text-danger">*</span></label>
                                    <input type="text" value="{{$product->title}}" name="title" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                {{-- Product Code --}}
                                <div class="col mb-3">
                                    <label class="form-label">Product Code <span class="text-danger">*</span></label>
                                    <input type="text" value="{{$product->code}}" name="code" class="form-control" />
                                </div>
                                {{-- Product Unit --}}
                                <div class="col mb-3">
                                    <label class="form-label">Product Unit</label>
                                    <input type="text" value="{{$product->unit}}" name="unit" class="form-control" />
                                </div>
                                {{-- Product Tags --}}
                                <div class="col mb-3">
                                    <label class="form-label">Product Tags</label>
                                    <input type="text" value="{{$product->tags}}" name="tags" class="form-control" />
                                </div>
                            </div>
                            {{-- Categories & Brand
                            <div class="row">
                                Category/SubCategory
                                <div class="col mb-3">
                                    <label class="form-label">Category/SubCategory <span
                                            class="text-danger">*</span></label>

                                    <select type="text" name="sub_category" class="form-select">
                                        @foreach ($categories as $category)
                                        <option class="fw-bold" disabled value="{{$category->id}}">
                                            {{$category->name}}</option>

                                        @foreach ($category->sub_categories as $subCategory)
                                        @if ($subCategory->category_id == $category->id)

                                        <option class="subCatOpt" value="{{$subCategory->id}}" {{$product->
                                            sub_category_id == $subCategory->id ? 'selected' :
                                            ''}}>---
                                            {{$subCategory->name}}</option>
                                        @endif
                                        @endforeach

                                        @endforeach
                                    </select>
                                </div>
                                ChildCategory
                                <div class="col mb-3">
                                    <label class="form-label">ChildCategory</label>
                                    <select type="text" name="child_category" class="form-select">
                                        <option disabled selected>Select...</option>
                                        @if ($product->child_category_id)
                                        @foreach ($childCategories as $childCategory)
                                        <option value="{{$childCategory->id}}" {{$product->child_category_id ==
                                            $childCategory->id ? 'selected' :
                                            ''}}>{{$childCategory->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div> --}}
                            {{-- Categories & Brand --}}
                            <div class="row">
                                {{-- Category --}}
                                <div class="col mb-3">
                                    <label class="form-label">Category<span class="text-danger">*</span></label>
                                    <select type="text" name="category" class="form-select">
                                        <option disabled selected>Select...</option>
                                        @foreach ($categories as $category)
                                        <option {{$category->id == $product->category_id ? 'selected' : ''}}
                                            value="{{$category->id}}">
                                            {{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col mb-3 sub_category">
                                    <label class="form-label">SubCategory</label>
                                    <select type="text" name="sub_category" class="form-select">
                                        <option disabled selected>Select...</option>
                                        @foreach ($subCategories as $subCategory)
                                        @if ($subCategory->category_id == $product->category_id)
                                        <option {{$subCategory->id == $product->sub_category_id ? 'selected' : ''}}
                                            value="{{$subCategory->id}}">{{ $subCategory->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                {{-- ChildCategory --}}
                                {{-- @if ($product->child_category_id) --}}
                                <div class="col mb-3 child_category">
                                    <label class="form-label">ChildCategory</label>
                                    <select type="text" name="child_category" class="form-select">
                                        <option disabled selected>Select...</option>
                                        @foreach ($childCategories as $childCategory)
                                        @if ($childCategory->sub_category_id == $product->sub_category_id)
                                        <option {{$childCategory->id == $product->child_category_id ? 'selected' : ''}}
                                            value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                {{-- @endif --}}
                                {{-- Brands --}}
                                <div class="col mb-3">
                                    <label class="form-label">Brands</label>
                                    <select type="text" name="brand" class="form-select">
                                        <option disabled value="" selected>Select...</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' :
                                            ''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- Prices --}}
                            <div class="row">
                                {{-- Purchase Price --}}
                                <div class="col mb-3">
                                    <label class="form-label">Purchase Price <span class="text-danger">*</span></label>
                                    <input type="number" value="{{$product->purchase_price}}" name="purchase_price"
                                        class="form-control" />
                                </div>
                                {{-- Selling Price --}}
                                <div class="col mb-3">
                                    <label class="form-label">Selling Price</label>
                                    <input type="number" value="{{$product->selling_price}}" name="selling_price"
                                        class="form-control" />
                                </div>
                                {{-- Discount Price --}}
                                <div class="col mb-3">
                                    <label class="form-label">Discount Price</label>
                                    <input type="number" value="{{$product->discount_price}}" name="discount_price"
                                        class="form-control" />
                                </div>
                                {{-- Stock Quantity --}}
                                <div class="col mb-3">
                                    <label class="form-label">In Stock <span class="text-danger">*</span></label>
                                    <input type="number" value="{{$product->stock_quantity}}" name="stock_quantity"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea class="rounded-0" id="editor-textarea" name="description">
                                        {!!$product->description!!}
                                    </textarea>
                                </div>

                                <div class="col-12 mt-5 pt-5">
                                    <label class="form-label">Video Embeded Code</label>
                                    <textarea name="video" class="form-control">{{$product->video}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-12 card p-3">
                                <label class="form-label">Product Thumbnail</label>
                                <input type="file" name="thumbnail" class="dropify" />
                                <input type="hidden" name="old_thumbnail" value="{{$product->thumbnail}}" />
                                <div>
                                    <p class="mb-0 mt-3 text-danger">Current Thumbnail</p>
                                    <img style="width:200px; height:auto!important;"
                                        src="{{asset('assets/admin/files/products/'.$product->thumbnail)}}" alt="" />
                                </div>

                                {{-- Product Gallery --}}
                                <div class="mt-3">
                                    <label class="form-label">Product Gallery</label>
                                    <input type="file" class="form-control" name="images[]" multiple />
                                    @if ($product->images)
                                    <p class="mb-0 mt-3 text-danger">Current Gallery Images</p>
                                    @foreach ($product->images as $image)
                                    <input type="hidden" name="old_images[]" value="{{$image}}" />
                                    <img style="width:150px; height:auto!important;"
                                        src="{{asset('assets/admin/files/products/'.$image)}}" alt="" />
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            {{-- Color --}}
                            <div class="col-12 mt-4 card p-3">
                                <label class="form-label mt-1">Colors</label>
                                <div class="d-flex flex-wrap colors">
                                    @if ($product->color)
                                    @foreach ($product->color as $color)
                                    <div class="color position-relative me-2 my-3">
                                        <input class="form-control form-control-color" type="color" name="color[]"
                                            value="{{$color}}" />

                                        <button type="button" class="btn btn-danger p-0 remove_color">
                                            <i class='bx bx-x'></i>
                                        </button>
                                    </div>
                                    @endforeach
                                    @endif
                                    <button type="button" class="btn btn-primary add_color">
                                        <i class='bx bx-plus'></i>
                                    </button>
                                </div>
                                <small class="text-danger">You can select one or many colors</small>
                            </div>
                            {{-- Size --}}
                            <div class="col-12 mt-4 card p-3">
                                <label class="form-label mt-1">Size</label>
                                <select name="size[]" class="form-select" size="3" multiple>
                                    <option selected disabled>Nothing Selected</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XLL">XLL</option>
                                    @for ($s=2; $s<=12; $s+=2) <option value="{{30+$s}}">{{30+$s}}</option>
                                        @endfor
                                </select>
                                @if ($product->size)
                                <input type="hidden" name="old_size" value="{{implode(" ",$product->size)}}">
                                @endif
                                <small class="text-danger">You can select one or many Size</small>
                            </div>
                            {{-- Home Banner --}}
                            <div class="col-12 mt-4 card p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="home_banner"
                                        {{$product->home_banner == 'on' ? 'checked' : ''}} />
                                    <label class="form-check-label fw-semibold mt-1 ms-3" for="home_banner">Home
                                        Banner</label>
                                </div>
                                <small class="text-danger">You can set Only one product on Banner</small>
                            </div>
                            {{-- Home Slider --}}
                            <div class="col-12 mt-4 card p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="home_slider"
                                        {{$product->home_slider == 'on' ? 'checked' : ''}} />
                                    <label class="form-check-label fw-semibold mt-1 ms-3" for="home_slider">Home
                                        Slider</label>
                                </div>
                            </div>
                            <div class="col-12 mt-4 card p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="featured"
                                        {{$product->featured == 'on' ? 'checked' : ''}} />
                                    <label class="form-check-label fw-semibold mt-1 ms-3"
                                        for="featured">Featured</label>
                                </div>
                            </div>
                            <div class="col-12 mt-4 card p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="status"
                                        {{$product->status == 'on' ? 'checked' : ''}} />
                                    <label class="form-check-label fw-semibold mt-1 ms-3" for="status">Status</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer pt-0">
                <button type="submit" class="btn btn-primary">Update Product</button>
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
    dependedSelect("select[name='sub_category']", '/dependedChildCategory/', "select[name='child_category']",
    ".child_category");

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
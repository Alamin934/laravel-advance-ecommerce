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
                            {{-- Categories & Brand --}}
                            <div class="row">
                                {{-- Category/SubCategory --}}
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
                                {{-- ChildCategory --}}
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
                                {{-- Brands --}}
                                <div class="col mb-3">
                                    <label class="form-label">Brands</label>
                                    <select type="text" name="brand" class="form-select">
                                        <option disabled value="" selected>Select...</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' :
                                            ''}}>{{$brand->brand_name}}</option>
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
                                    <div class="form-control rounded-0" id="editor-textarea">{{$product->description}}
                                    </div>
                                    <textarea class="d-none" id="description" name="description"></textarea>
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
                                {{-- <img style="height:200px; width:auto!important;"
                                    src="{{asset('admin/assets/files/products/'.$product->thumbnail)}}" alt="" /> --}}

                                {{-- Product Gallery --}}
                                <div class="mt-3">
                                    <label class="form-label">Product Gallery</label>
                                    <input type="file" class="form-control" name="images[]" multiple />
                                    @if ($product->images)
                                    @foreach ($product->images as $image)
                                    <input type="hidden" name="old_images[]" value="{{$image}}" />
                                    @endforeach
                                    @endif
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
</script>
@endpush
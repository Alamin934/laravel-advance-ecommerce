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
                                    {{-- Category/SubCategory --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Category/SubCategory <span
                                                class="text-danger">*</span></label>
                                        <select type="text" name="sub_category" class="form-select">
                                            <option disabled selected>Select...</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                            @foreach ($category->sub_categories as $subCategory)
                                            @if ($subCategory->category_id == $category->id)

                                            <option class="subCatOpt" value="{{$subCategory->id}}">---
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
                                            {{--@foreach ($childCategories as $childCategory)
                                            <option value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                            @endforeach--}}
                                        </select>
                                    </div>
                                    {{-- Brands --}}
                                    <div class="col mb-3">
                                        <label class="form-label">Brands</label>
                                        <select type="text" name="brand" class="form-select">
                                            <option value="" selected>Select...</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
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
                                        <textarea class="form-control rounded-0 d-block" id="editor-textarea"
                                            name="description">
                                        </textarea>
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
    $(document).ready(function () {

        // Depended ChildCategory on SubCategory
        $("select[name='sub_category']").on("change", function() {
            let subCatId = $("select[name='sub_category'] .subCatOpt:selected").val();
            if(subCatId){
                $.ajax({
                    type: "GET",
                    url: '/dependedChildCategory/'+subCatId,
                    dataType: "json",
                    success: function (data) {
                        if(data != ''){
                            $("select[name='child_category']").empty();
                            $.each(data, function (index, value) {
                                $("select[name='child_category']").append(`<option value='${index}'>${value}</option>`);
                            });
                        }else{
                            $("select[name='child_category']").empty();
                        }
                    }
                });
            }else{
                $("select[name='child_category']").empty();
            }
        });


        $('.dropify').dropify({
            messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
            }
        });

    });


    var quill = new Quill('#editor-textarea', {placeholder: 'Product Description...', theme: 'snow'});

</script>
@endpush
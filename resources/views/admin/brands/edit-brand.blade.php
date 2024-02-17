@extends('admin.layout.admin-layout')

@section('main-content')
{{-- Add Brand Start --}}
<div class="mt-3">
    <!-- card -->
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between">
            <h5 class="card-title">Brands</h5>
            <div class="pe-3">
                <a href="{{route('brand.index')}}" class="btn btn-primary p-2">See Brands List</a>
            </div>
        </div>
        <form action="{{route('brand.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label">Brand Name</label>
                        <input type="text" value="{{$brand->name}}" name="name"
                            class="form-control form-control-lg" placeholder="Enter child Category Name" />
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Brand Logo</label>

                        <input type="file" name="brand_logo" class="dropify" />
                        {{-- Old Brand Logo --}}

                        <img src="{{asset('admin/assets/files/brands/'.$brand->brand_logo)}}"
                            alt="{{$brand->name}}">
                        <input type="hidden" name="old_brand_logo" value="{{$brand->brand_logo}}">
                    </div>
                </div>
            </div>
            <div class="card-footer pt-0">
                <button type="submit" class="btn btn-primary">Add Child Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
            $('.dropify').dropify({
                messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
                }
            });
        });
</script>
@endpush
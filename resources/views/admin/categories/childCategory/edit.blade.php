@extends('admin.layout.admin-layout')

@section('main-content')
{{-- child_category Edit card Start --}}
<div class="mt-3">
    <!-- card -->
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between">
            <h5 class="card-title">Edit child_category</h5>
            <div class="pe-3">
                <a href="{{route('childCategory.index')}}" class="btn btn-primary p-2">See Child Category List</a>
            </div>
        </div>
        <form action="{{route('childCategory.update', $child_category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label">Parent Category</label>
                        <select type="text" name="parent_category" class="form-select form-select-lg">
                            <option value="" selected>Select...</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id==$child_category->category_id ? 'selected'
                                :
                                ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('parent_category')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Sub Category</label>
                        <select type="text" name="sub_category" class="form-select form-select-lg">
                            <option value="" selected>Select...</option>
                            @foreach ($sub_categories as $sub_category)
                            <option value="{{$sub_category->id}}" {{$sub_category->id==$child_category->sub_category_id
                                ? 'selected'
                                :
                                ''}}>{{$sub_category->name}}</option>
                            @endforeach
                        </select>
                        @error('sub_category')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Child Category Name</label>
                        <input type="text" value="{{$child_category->name}}" name="name"
                            class="form-control form-control-lg" placeholder="Enter child Category Name" />
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer pt-0">
                <button type="submit" class="btn btn-primary">Update Child Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
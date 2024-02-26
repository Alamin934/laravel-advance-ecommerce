@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Sub Category List</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Sub Category</h5>
                <div class="pe-3">
                    <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal"
                        data-bs-target="#add_sub_category">+Add Sub Category</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Parent Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($sub_categories as $sub_category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sub_category->name }}</td>
                            <td>{{ $sub_category->slug }}</td>
                            <td>{{ $sub_category->category->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger Edit Modal -->
                                    <button type="button" data-sub_cat_id="{{$sub_category->id}}"
                                        class="btn btn-primary p-2 me-2 sub_cat_edit" data-bs-toggle="modal"
                                        data-bs-target="#sub_cat_update">
                                        <i class="bx bx-edit-alt"></i>
                                    </button>

                                    {{-- <a href="{{route('subCategory.destroy',$sub_category->id)}}"
                                        class="btn btn-danger p-2">
                                        <i class="bx bx-trash"></i>
                                    </a> --}}
                                    @if (!Auth::user()->hasRole('editor') || Auth::user()->hasRole('moderator'))
                                    <form action="{{route('subCategory.destroy', $sub_category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger p-2"><i
                                                class="bx bx-trash"></i></button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>

    {{-- sub_category Add Modal Start --}}
    <div class="mt-3">
        <!-- Modal -->
        <div class="modal fade" id="add_sub_category" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Add sub_category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('subCategory.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Parent Category</label>
                                    <select type="text" name="parent_category" class="form-select">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_category')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Sub Category Name</label>
                                    <input type="text" name="sub_category_name" class="form-control"
                                        placeholder="Enter Sub Category Name" />
                                    @error('sub_category_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- sub_category Edit Modal Start --}}
    <div class="mt-3">
        <!-- Modal -->
        <div class="modal fade" id="sub_cat_update" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit sub_category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('subCategory.update', 0)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" id="sub_cat_id" name="sub_cat_id">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Parent Category</label>
                                    <select type="text" id="edit_parent_cat" name="edit_parent_cat" class="form-select">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_category')
                                    <p class=" text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Sub Category Name</label>
                                    <input type="text" id="edit_sub_cat_name" name="edit_sub_cat_name"
                                        class="form-control" />
                                    @error('edit_sub_cat_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
            $('.sub_cat_edit').on('click', function () {
                let sub_cat_id = $(this).data('sub_cat_id');

                $.ajax({
                    type: "GET",
                    url: `subCategory/${sub_cat_id}/edit`,
                    success: function (data) {
                        $('#sub_cat_id').val(data.id);
                        $('#edit_sub_cat_name').val(data.name);
                        $("#edit_parent_cat option").each(function(){
                            if ($(this).val() == data.category_id){
                                $(this).attr("selected","selected");
                            }else{
                                $(this).removeAttr("selected");
                            }
                        });
                    }
                });
            });
        });
</script>
@endpush
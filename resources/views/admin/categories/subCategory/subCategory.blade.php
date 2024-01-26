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
                                <div>
                                    <!-- Button trigger Edit Modal -->
                                    <button type="button" data-cat_id="{{$sub_category->id}}"
                                        class="btn btn-primary p-2 cat_edit" data-bs-toggle="modal"
                                        data-bs-target="#editsub_category">
                                        <i class="bx bx-edit-alt"></i>
                                    </button>
                                    <a href="{{ route('subCategory.destroy', $sub_category->id) }}" id="delete"
                                        class="btn btn-danger p-2">
                                        <i class="bx bx-trash"></i>
                                    </a>
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
                            <button type="submit" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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
        <div class="modal fade" id="editsub_category" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Edit sub_category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="" class="form-label">sub_category Name</label>
                                    <input type="hidden" id="edit_cat_id" name="edit_cat_id" />

                                    <input type="text" name="edit_cat_name" id="edit_cat_name" class="form-control"
                                        placeholder="Enter sub_category Name" />
                                    @error('edit_cat_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" id="cat_update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
{{-- <script>
    $(document).ready(function () {
            $('.cat_edit').on('click', function () {
                let cat_id = $(this).data('cat_id');

                $.ajax({
                    type: "GET",
                    url: `sub_category/${cat_id}/edit`,
                    success: function (data) {
                        $('#edit_cat_id').val(data.id);
                        $('#edit_cat_name').val(data.name);
                    }
                });
            });
        });
</script> --}}
@endpush
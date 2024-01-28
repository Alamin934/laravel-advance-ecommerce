@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Child Category List</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Child Category</h5>
                <div class="pe-3">
                    <a href="{{route('childCategory.create')}}" class="btn btn-primary p-2">+Add child Category</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Sub Category</th>
                            <th>Parent Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($child_categories as $child_category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $child_category->name }}</td>
                            <td>{{ $child_category->slug }}</td>
                            <td>{{ $child_category->sub_category->name }}</td>
                            <td>{{ $child_category->category->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger Edit Modal -->
                                    <a href="{{route('childCategory.edit', $child_category->id)}}"
                                        class="btn btn-primary p-2 me-2">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    <form action="{{route('childCategory.destroy', $child_category->id)}}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="childmit" class="btn btn-danger p-2"><i
                                                class="bx bx-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-5 mt-4">
                {{ $child_categories->links() }}
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
</div>
@endsection
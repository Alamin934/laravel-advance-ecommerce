@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Brand List</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Brand</h5>
                <div class="pe-3">
                    <a href="{{route('brand.create')}}" class="btn btn-primary p-2">+Add New Brand</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Logo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->logo }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger Edit Modal -->
                                    <a href="{{route('childCategory.edit', $brand->id)}}"
                                        class="btn btn-primary p-2 me-2">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    <form action="{{route('childCategory.destroy', $brand->id)}}" method="POST">
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
                {{ $brands->links() }}
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
</div>
@endsection
@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Product List</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Product</h5>
                <div class="pe-3">
                    <a href="" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#addProduct">+Add New
                        Product</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product Code</th>
                            <th>Valid Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $product)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger Edit Modal -->
                                    <a href="" class="btn btn-primary p-2 me-2" data-bs-toggle="modal"
                                        data-bs-target="#editProduct">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger deleteProduct p-2" data-id="">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="px-5 mt-4">
                {{ $products->links() }}
            </div> --}}
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
</div>
@endsection
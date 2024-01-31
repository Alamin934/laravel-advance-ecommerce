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
                    <a href="{{route('product.create')}}" class="btn btn-primary p-2">+Add New
                        Product</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Category/Sub Category</th>
                            <th>Child Category</th>
                            <th>InStock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{asset('admin/assets/files/products/'.$product->thumbnail)}}" alt=""
                                    class="me-3" style="height:40px;width:auto">
                                {{Illuminate\Support\Str::words($product->title, 5, '...')}}
                            </td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->purchase_price }}</td>
                            <td>{{ $product->category->name }}/{{$product->sub_category_id ?
                                $product->subCategory->name : ''}}</td>
                            <td>{{$product->child_category_id ? $product->childCategory->name : '' }}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>{{ $product->status == 'on' ? 'Active' : 'InActive' }}</td>
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
@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Orders List</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card orders">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">All Orders</h5>
            </div>
            <div class="card">
                <div class="row mb-3 px-3">
                    <div class="col-3">
                        <label class="form-label">Status</label>
                        <select name="filter_status" class="form-select order_filter">
                            <option value="all">All</option>
                            <option value="on">Active</option>
                            <option value="">InActive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Sub Total</th>
                            <th>Coupon</th>
                            <th>Dicount</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 t-body">
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td> --}}
                                {{-- <img src="{{asset('assets/admin/files/orders/'.$order->thumbnail)}}" alt=""
                                    class="me-3" style="height:40px;width:auto">
                                {{Illuminate\Support\Str::words($order->title, 4, '')}} --}}
                                {{-- </td> --}}
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>{{ $order->customer_email }}</td>
                            <td>{{ $order->sub_total }}</td>
                            <td>{{ $order->coupon_code }}</td>
                            <td>{{ $order->coupon_discount }}</td>
                            <td>{{ $order->coupon_after_discount ?? $order->total }}</td>
                            {{-- <td>{{ $order->category->name }}</td>
                            <td>{{$order->subCategory->name ?? ''}}</td>
                            <td>{{$order->childCategory->name ?? ''}}</td>
                            <td>{{ $order->stock_quantity }}</td> --}}
                            {{-- <td> --}}
                                {{-- <div class="form-check form-switch">
                                    <input data-id="{{$order->id}} {{$order->status}}" class="form-check-input status"
                                        type="checkbox" role="switch" {{$order->status
                                    == 'on' ? 'checked' : ''}} >
                                </div> --}}
                                {{-- </td> --}}
                            <td>
                                <div class="d-flex">
                                    <a href="" class="btn btn-info p-2 me-2">
                                        <i class='bx bx-low-vision'></i>
                                    </a>

                                    <a href="" class="btn btn-primary p-2 me-2">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger p-2">
                                        <i class="bx bx-trash"></i>
                                    </button>
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
</div>
@endsection
@push('scripts')
{{-- <script>
    $(document).ready(function () {
        // Delete order with Ajax
        $(document).on('click','.deleteorder', function () {
            let order_id = $(this).data('id');
            ajaxDeleteWithToastr("DELETE", "{{url('admin/order/{order_id}')}}", {id:order_id}, "order Deleted Successfully");
        });
        
        // order Filtering
        $(document).on('change','.order_filter', function(){
            let cat_id = $('.order_filter[name="filter_cat"]').val();
            let brand_id = $('.order_filter[name="filter_brand"]').val();
            let status = $('.order_filter[name="filter_status"]').val();
            $.ajax({
                type: "POST",
                url: "{{route('order.filter')}}",
                data: {cat_id:cat_id, brand_id:brand_id, status:status},
                success: function (response) {
                    $('.t-body').html(response);
                }
            });
        });

        // Update Featured without Reload
        $(document).on('change', '.featured', function() {
            let featured = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "/admin/order/changeFeatured/"+featured,
                data: featured,
                success: function (response) {
                    $('.orders').load(location.href+' .orders');
                    toastr.success(response.status);
                }
            });
        });
        
        
        // Update order Status without Reload
        $(document).on('change', '.status', function() {
            let status = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "/admin/order/changeStatus/"+status,
                data: status,
                success: function (response) {
                    $('.orders').load(location.href+' .orders');
                    toastr.success(response.status);
                }
            }); 
        });
    });
</script> --}}
@endpush
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
                        <label class="form-label">Order Status</label>
                        <select name="filter_order_status" class="form-select order_status_filter">
                            <option value="all">All</option>
                            <option value="pending">Pending</option>
                            <option value="received">Received</option>
                            <option value="shipped">Shipped</option>
                            <option value="returned">Returned</option>
                            <option value="complete">Complete</option>
                            <option value="cancel">Cancel</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="form-label">Payment Status</label>
                        <select name="filter_status" class="form-select payment_status_filter">
                            <option value="all">All</option>
                            <option value="pending">Pending</option>
                            <option value="received">Received</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="form-label">Payment Type</label>
                        <select name="filter_status" class="form-select payment_type_filter">
                            <option value="all">All</option>
                            <option value="aamarPay">Aamar Pay</option>
                            <option value="sslcommerze">SSLCOMMERZE</option>
                            <option value="cash-on-delivery">Cash On Delivery</option>
                            <option value="paypal">Paypal</option>
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
                            <th>Coupon Code</th>
                            <th>Dicount</th>
                            <th>Total</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 t-body">
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>{{ $order->customer_email }}</td>
                            <td>{{ $order->sub_total }}</td>
                            <td>{{ $order->coupon_code }}</td>
                            <td>{{ $order->coupon_discount }}</td>
                            <td>{{ $order->coupon_after_discount ?? $order->total }}</td>
                            <td>
                                @switch($order->order_status)
                                @case("pending")
                                <span class="badge text-bg-danger">Pending</span>
                                @break
                                @case("received")
                                <span class="badge text-bg-primary">Recieved</span>
                                @break
                                @case("shipped")
                                <span class="badge text-bg-info">Shipped</span>
                                @break
                                @case("returned")
                                <span class="badge text-bg-warning">Returned</span>
                                @break
                                @case("completed")
                                <span class="badge text-bg-success">Completed</span>
                                @break
                                @default
                                <span class="badge text-bg-danger">Cancel</span>
                                @endswitch
                            </td>
                            <td>{{ $order->payment_type }}</td>
                            <td>
                                @switch($order->payment_status)
                                @case("received")
                                <span class="badge text-bg-primary">Recieved</span>
                                @break
                                @default
                                <span class="badge text-bg-danger">Pending</span>
                                @endswitch
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('order.show', $order->id)}}" class="btn btn-info p-2 me-2"
                                        title="See Orders Details">
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
<script>
    $(document).ready(function () {
        // Delete order with Ajax
        // $(document).on('click','.deleteorder', function () {
        //     let order_id = $(this).data('id');
        //     ajaxDeleteWithToastr("DELETE", "{{url('admin/order/{order_id}')}}", {id:order_id}, "order Deleted Successfully");
        // });
        
        // order Filtering
        function ordersFilterWithAjax(className, url){
            $(document).on('change',className, function(){
                let val = $(this).val();
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {val:val},
                    success: function (response) {
                        let html = '';
                        if(response.orders.length > 0){
                            let orders = response.orders;
                            $.each(orders, function (index, order) {
                                let order_status;
                                switch(order.order_status){
                                    case 'pending' :
                                    order_status = '<span class="badge text-bg-danger">Pending</span>';
                                    break;
                                    case "received" :
                                    order_status = '<span class="badge text-bg-primary">Recieved</span>';
                                    break;
                                    case "shipped" :
                                    order_status = '<span class="badge text-bg-info">Shipped</span>';
                                    break;
                                    case "returned" :
                                    order_status = '<span class="badge text-bg-warning">Returned</span>';
                                    break;
                                    case "completed" :
                                    order_status = '<span class="badge text-bg-success">Completed</span>';
                                    break;
                                    default:
                                    order_status = '<span class="badge text-bg-danger">Cancel</span>';
                                }
                                let payment_status;
                                switch(order.payment_status){
                                    case 'received' :
                                    payment_status = '<span class="badge text-bg-primary">Recieved</span>';
                                    break;
                                    default:
                                    payment_status = '<span class="badge text-bg-danger">Pending</span>';
                                }
                                html+=`
                                <tr>
                                    <td>${index+1}</td>
                                    <td>${order.customer_name}</td>
                                    <td>${order.customer_phone}</td>
                                    <td>${order.customer_email}</td>
                                    <td>${order.sub_total}</td>
                                    <td>${order.coupon_code}</td>
                                    <td>${order.coupon_discount}</td>
                                    <td>${order.coupon_after_discount ? order.coupon_after_discount : order.total}</td>
                                    <td>${order_status}</td>
                                    <td>${order.payment_type}</td>
                                    <td>${payment_status}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('order.show', $order->id)}}" class="btn btn-info p-2 me-2" title="See Orders Details">
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
                                </tr>`;
                            });
                            
                        }else{
                            html+= `<tr><td colspan="12" align="center"><h4>No Orders Found</h4></td></tr>`;
                        }
                        $('.t-body').html(html);
                    }
                });
            });
        }
        ordersFilterWithAjax('.order_status_filter','{{route("order.status.filter")}}');
        ordersFilterWithAjax('.payment_status_filter','{{route("payment.status.filter")}}');
        ordersFilterWithAjax('.payment_type_filter','{{route("payment.type.filter")}}');

        // Update Featured without Reload
        // $(document).on('change', '.featured', function() {
        //     let featured = $(this).data('id');
        //     $.ajax({
        //         type: "POST",
        //         url: "/admin/order/changeFeatured/"+featured,
        //         data: featured,
        //         success: function (response) {
        //             $('.orders').load(location.href+' .orders');
        //             toastr.success(response.status);
        //         }
        //     });
        // });
        
        
        // // Update order Status without Reload
        // $(document).on('change', '.status', function() {
        //     let status = $(this).data('id');
        //     $.ajax({
        //         type: "POST",
        //         url: "/admin/order/changeStatus/"+status,
        //         data: status,
        //         success: function (response) {
        //             $('.orders').load(location.href+' .orders');
        //             toastr.success(response.status);
        //         }
        //     }); 
        // });
    });
</script>
@endpush
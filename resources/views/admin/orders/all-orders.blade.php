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
                            <th>Order Id</th>
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
                            <td>{{ "#".$order->order_id }}</td>
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
                                @case("delivered")
                                <span class="badge text-bg-success">Delivered</span>
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

                                    <a href="" data-id="{{$order->id}}" data-bs-toggle="modal"
                                        data-bs-target="#updateOrderStatus"
                                        class="btn btn-primary p-2 me-2 updateOrderStatus">
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
{{-- Update status modal --}}
<div class="modal fade" tabindex="-1" id="updateOrderStatus" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content updateStatus">
            <form method="POST" id="updateStatus">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="order-id" name="order_id">
                    <input type="hidden" id="cus-email" name="email">
                    <div class="mb-3">
                        <label class="form-label">Order Status</label>
                        <select class="form-select" id="order-status" name="order_status">
                            <option select @disabled(true)>Select</option>
                            <option value="pending">Pending</option>
                            <option value="received">Recieved</option>
                            <option value="shipped">Shipped</option>
                            <option value="returned">Returned</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancel">Cancel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Payment Status</label>
                        <select select class="form-select" id="payment-status" name="payment_status">
                            <option @disabled(true)>Select</option>
                            <option value="pending">Pending</option>
                            <option value="received">Recieved</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
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
                                    case "delivered" :
                                    order_status = '<span class="badge text-bg-success">Delivered</span>';
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
                                    <td>#${order.order_id}</td>
                                    <td>${order.customer_name}</td>
                                    <td>${order.customer_phone}</td>
                                    <td>${order.customer_email}</td>
                                    <td>${order.sub_total}</td>
                                    <td>${order.coupon_code ? order.coupon_code : ''}</td>
                                    <td>${order.coupon_discount ? order.coupon_discount : ''}</td>
                                    <td>${order.coupon_after_discount ? order.coupon_after_discount : order.total}</td>
                                    <td>${order_status}</td>
                                    <td>${order.payment_type}</td>
                                    <td>${payment_status}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('order.show', $order->id)}}" class="btn btn-info p-2 me-2" title="See Orders Details">
                                                <i class='bx bx-low-vision'></i>
                                            </a>
                                        
                                            <a href="" data-id="{{$order->id}}" data-bs-toggle="modal" data-bs-target="#updateOrderStatus" class="btn btn-primary p-2 me-2 updateOrderStatus">
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

        // Edit Order without Reload
        $(document).on('click', '.updateOrderStatus', function() {
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: `/admin/order/${id}/edit`,
                success: function (response) {
                    $("#order-id").val(response.id);
                    $("#cus-email").val(response.customer_email);
                    $("#order-status option").each(function(){
                        let orderStatus = $(this).val()
                        if(response.order_status == orderStatus){
                            $("#order-status option:selected").attr('selected',false);
                            $("#order-status option[value='"+orderStatus+"']").attr('selected',true);
                        }
                    });
                    $("#payment-status option").each(function(){
                        let paymentStatus = $(this).val()
                        if(response.payment_status == paymentStatus){
                            $("#payment-status option:selected").attr('selected',false);
                            $("#payment-status option[value='"+paymentStatus+"']").attr('selected',true);
                        }
                    });
                }
            });
        });
        
        
        // Update order/payment Status without Reload
        $(document).on('submit', 'form#updateStatus', function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "/admin/order/updateStatus",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status == 'success'){
                        $("#updateOrderStatus").modal('hide');
                        $('.updateStatus').load(location.href+' form#updateStatus');
                        $('.table-responsive').load(location.href+' .table');
                        toastr.success("Status Updated Successfully");
                    }
                }
            }); 
        });
    });
</script>
@endpush
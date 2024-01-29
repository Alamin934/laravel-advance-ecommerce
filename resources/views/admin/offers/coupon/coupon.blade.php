@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Coupon List</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Coupon</h5>
                <div class="pe-3">
                    <a href="" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#addCoupon">+Add New
                        Coupon</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Coupon Code</th>
                            <th>Valid Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($coupons as $coupon)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $coupon->coupon_code }}</td>
                            <td>{{ $coupon->valid_date }}</td>
                            <td>{{ $coupon->type }}</td>
                            <td>{{ $coupon->amount }}</td>
                            <td>{{ $coupon->status == 1 ? 'Active' : 'InActive' }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger Edit Modal -->
                                    <a href="" class="btn btn-primary p-2 me-2" data-bs-toggle="modal"
                                        data-bs-target="#editCoupon">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger p-2"><i
                                                class="bx bx-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="px-5 mt-4">
                {{ $coupons->links() }}
            </div> --}}
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
</div>
@include('admin.offers.coupon.add-coupon')
@endsection

@push('scripts')
<script>
    $(document).ready(function () {

        $('#submitCoupon').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{route('coupon.store')}}",
                data: formData,
                // dataType: "dataType",
                success: function (response) {
                    if(response.status == 'success'){
                        $('.error-msg').hide();
                        $('#addCoupon').modal('hide');
                        $('#submitCoupon').trigger('reset');
                        $('.table').load(location.href+' .table');
                        toastr.success("Coupon Added Successfully");
                    }
                },error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.error-msg').append(`<span class="text-danger">${value}</span><br>`);
                    });
                    
                }
            });
        });

    });
</script>
@endpush
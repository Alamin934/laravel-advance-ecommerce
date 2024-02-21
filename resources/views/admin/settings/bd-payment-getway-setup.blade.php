@extends('admin.layout.admin-layout')

@section('main-content')
{{-- SMTP Start --}}
<div class="mt-3">
    <!-- card -->
    <div class="card">
        <div class="card-header pb-0">
            <h3 class="card-title">Payment Getway Setup</h3>
        </div>
        <div class="card-body mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="bg-primary p-2 rounded-top">
                        <h5 class="text-white py-2 mb-0">AamarPay</h5>
                    </div>
                    <div class="aamarPay">
                        <form method="post" id="storeAamarPay" class="p-2 shadow-sm py-3 rounded-bottom">
                            <div class="error-msg"></div>
                            <div class="mb-3">
                                <input type="hidden" id="getway_name" name="getway_name" value="aamarPay" />
                                <label class="form-label">Store Id</label>
                                <input type="text" id="store_id" name="store_id" class="form-control"
                                    value="{{$aamarPay->store_id ?? ''}}" placeholder="Enter aamarPay store id" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Secret/Signature Key</label>
                                <input type="text" id="secret_key" name="secret_key" class="form-control"
                                    value="{{$aamarPay->secret_key ?? ''}}"
                                    placeholder="Enter aamarPay Secret/Signature Key" />
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="status" class="form-check-input" id="status"
                                    {{$aamarPay?->status == 'on' ? 'checked' : ''}}/>
                                <label class="form-check-label mt-1" for="status">Live Server</label>
                                <small class="text-warning">If it's unchecked, it's on sandbox</small>
                            </div>
                            @if ($aamarPay?->secret_key)
                            <button type="button" class="btn btn-danger delete-getway"
                                data-id="aamarPay">Delete</button>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                {{-- SSL Commerze --}}
                <div class="col-md-4">
                    <div class="bg-primary p-2 rounded-top">
                        <h5 class="text-white py-2 mb-0">SSL Commerze</h5>
                    </div>
                    <div class="sslcommerze">
                        <form method="post" id="storeSslcommerze" class="p-2 shadow-sm py-3 rounded-bottom">
                            <div class="error-msg"></div>
                            <div class="mb-3">
                                <input type="hidden" id="getway_name" name="getway_name" value="sslcommerze" />
                                <label class="form-label">Store Id</label>
                                <input type="text" id="store_id" name="store_id" class="form-control"
                                    value="{{$sslcommerze->store_id ?? ''}}" placeholder="Enter aamarPay store id" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Secret/Signature Key</label>
                                <input type="text" id="secret_key" name="secret_key" class="form-control"
                                    value="{{$sslcommerze->secret_key ?? ''}}"
                                    placeholder="Enter aamarPay Secret/Signature Key" />
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="status" class="form-check-input" id="status"
                                    {{$sslcommerze?->status == 'on' ? 'checked' : ''}}/>
                                <label class="form-check-label mt-1" for="status">Live Server</label>
                                <small class="text-warning">If it's unchecked, it's on sandbox</small>
                            </div>
                            @if ($sslcommerze?->secret_key)
                            <button type="button" class="btn btn-danger delete-getway"
                                data-id="sslcommerze">Delete</button>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@push('styles')
<style>
    .form-check-input {
        width: 1.4rem !important;
        height: 1.4rem !important;
    }
</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('submit','form#storeAamarPay', function (e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            storePaymentGetway(formData,'.aamarPay','form#storeAamarPay');
        });
        $(document).on('submit','form#storeSslcommerze', function (e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            storePaymentGetway(formData,'.sslcommerze','form#storeSslcommerze');
        });

        $(document).on('click','.delete-getway', function (e) {
            e.preventDefault();
            let getway_name = $(this).data('id');
            let formId = $(this).parent().attr('id');
            let loadClass;
            if(formId == 'storeSslcommerze'){
                loadClass = 'sslcommerze';
            }else{
                loadClass = 'aamarPay';
            }

            deletePaymentGetway(getway_name,loadClass,formId);
        });
        // Store/Update Payment Getway info
        function storePaymentGetway(formData, loadclass, formId){
            $.ajax({
                type: "POST",
                url: "{{route('setting.store.bd.payment.getway')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status=='success'){
                        $(loadclass).find('.error-msg').html('');
                        toastr.success('Payment Getway Updated Successfully');
                        $(loadclass).load(location.href+' '+formId);
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) { 
                            $(loadclass).find('.error-msg').append(`<span class='text-danger'>${value}</span><br>`);
                    });
                },
            });
        }

        // Delete Payment Getway info
        function deletePaymentGetway(getway_name,loadclass,formId){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "{{route('setting.delete.bd.payment.getway')}}",
                        data: {getway_name:getway_name},
                        success: function (response) {
                            if(response.status=='success'){
                                toastr.success('Payment Getway Deleted Successfully');
                                $('.'+loadclass).load(location.href+` #${formId}`);
                            }
                        }
                    });
                }
            });
        }
    });
</script>
@endpush
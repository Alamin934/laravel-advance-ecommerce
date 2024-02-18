@extends('frontend.layouts.app')

@section('dashboard-content')
<div>
    <h3>Shipping Details</h3>
    <ul class="error-msg text-danger"></ul>
</div>
<div class="mt-3 shipping">
    <form method="POST" id="addShipping">
        @csrf
        {{-- Email --}}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                value="{{$shipping->email ?? ''}}">
        </div>
        <div class="form-row">
            {{-- Name --}}
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                    value="{{$shipping->name ?? ''}}">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone"
                    value="{{$shipping->phone ?? ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                value="{{$shipping->address ?? ''}}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{$shipping->city ?? ''}}">
            </div>
            <div class="form-group col-md-3">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{$shipping->state ?? ''}}">
            </div>
            <div class="form-group col-md-2">
                <label for="postal_code">Zip/Postal Code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code"
                    value="{{$shipping->postal_code ?? ''}}">
            </div>
            <div class="form-group col-md-3">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="Bangladesh" @readonly(true)>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Save</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('submit','#addShipping', function (e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);

            $.ajax({
                type: "POST",
                url: "{{route('dashboard.shipping.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status == 'success'){
                        $('.error-msg').html('');
                        toastr.success("Shipping added successfully");
                        // $("form#addShipping").trigger('reset');
                        $(".shipping").load(location.href+' form#addShipping');
                    }
                },
                error: function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) { 
                         $('.error-msg').append(`<li>${value}</li>`);
                    });
                }
            });
        });
    });
</script>
@endpush
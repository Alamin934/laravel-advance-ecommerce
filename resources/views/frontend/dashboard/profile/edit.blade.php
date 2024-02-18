@extends('frontend.layouts.app')

@section('dashboard-content')
@include('frontend.dashboard.profile.partials.update-profile-information-form')
@include('frontend.dashboard.profile.partials.update-password-form')
@include('frontend.dashboard.profile.partials.delete-user-form')
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Hide Profile update success msg
        setTimeout(() => {
            $('.profile-updated').fadeOut();
        }, 4000);

        setTimeout(() => {
            $('.password-updated').fadeOut();
        }, 4000);

        // Delete User with Ajax
        // $(document).on('click', '#deleteAccount', function (e) {
        //     e.preventDefault();
        //     $.ajax({
        //         type: "DELETE",
        //         url: "{{route('dashboard.profile.destroy')}}",
        //         success: function (response) {
        //             if(response.status == 'success'){
        //                 window.location.replace('/')
        //             }
        //         },
        //         error: function (err) {
        //             let error = err.responseJSON;
        //             $.each(error.errors, function (index, value) {
        //                 $('.error-msg').html(`<span class="text-danger">${value}</span><br>`);
        //             });
        //         }
        //     });
            
        // });
    });
</script>
@endpush
@extends('frontend.layouts.app')

@section('main-nav')
@include('frontend.partials.collapse-main-navigation')
@endsection

@section('main-content')
<!-- Contact Info -->
<div class="contact_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div
                    class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="{{asset('assets/frontend')}}/images/contact_1.png"
                                alt="">
                        </div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Phone</div>
                            <div class="contact_info_text">+38 068 005 3570</div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="{{asset('assets/frontend')}}/images/contact_2.png"
                                alt="">
                        </div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Email</div>
                            <div class="contact_info_text">fastsales@gmail.com</div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="{{asset('assets/frontend')}}/images/contact_3.png"
                                alt="">
                        </div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Address</div>
                            <div class="contact_info_text">10 Suffolk at Soho, London, UK</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->
<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_form_container">
                    <div class="contact_form_title">Get in Touch</div>

                    <form method="POST" id="contact_form">
                        @csrf
                        <div class="contact_form_inputs row">

                            <div class="col-md-4">
                                <input type="text" name="name" id="name" class="contact_form_name form-control"
                                    style="height: 50px!important" placeholder="Your name">
                                <span class="name-err text-danger"></span>
                            </div>

                            <div class="col-md-4">
                                <input type="email" name="email" id="email" class="contact_form_email form-control"
                                    style="height: 50px!important" placeholder="Your email">
                                <span class="email-err text-danger"></span>
                            </div>

                            <div class="col-md-4">
                                <input type="text" name="phone" id="phone" class="contact_form_phone form-control"
                                    style="height: 50px!important" placeholder="Your phone number">
                                <span class="phone-err text-danger"></span>
                            </div>
                        </div>
                        <div class="contact_form_text">
                            <textarea name="message" id="message" class="text_field contact_form_message" name="message"
                                rows="4" placeholder="Message"></textarea>
                            <span class="message-err text-danger"></span>
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" class="button contact_submit_button">Send Message</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>

<!-- Map -->
{{-- <div class="contact_map">
    <div id="google_map" class="google_map">
        <div class="map_container">
            <div id="map"></div>
        </div>
    </div>
</div> --}}
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/contact_responsive.css">
@endpush
@push('scripts')
{{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
--}}
<script src="{{ asset('assets/frontend') }}/js/contact_custom.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('submit','form#contact_form', function (e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "{{route('contact.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status == 'success'){
                        $("form#contact_form").trigger('reset');
                        toastr.success("Thank you for your message. We will contact you soon.");
                        $('.name-err').html('');
                        $('.phone-err').html('');
                        $('.email-err').html('');
                        $('.message-err').html('');
                    }
                },error: function (err) {
                    let error = err.responseJSON;
                    $('.name-err').html(error.errors.name);
                    $('.phone-err').html(error.errors.phone);
                    $('.email-err').html(error.errors.email);
                    $('.message-err').html(error.errors.message);
                }
            });
        });
    });
</script>
@endpush
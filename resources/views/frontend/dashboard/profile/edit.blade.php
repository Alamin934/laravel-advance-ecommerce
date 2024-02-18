@extends('frontend.layouts.app')

@section('dashboard-content')
@include('frontend.dashboard.profile.partials.update-profile-information-form')
@include('frontend.dashboard.profile.partials.update-password-form')
@include('frontend.dashboard.profile.partials.delete-user-form')
@endsection
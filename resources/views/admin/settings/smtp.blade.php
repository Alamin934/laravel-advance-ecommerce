@extends('admin.layout.admin-layout')

@section('main-content')
{{-- SMTP Start --}}
<div class="mt-3">
    <!-- card -->
    <div class="card">
        <div class="card-header pb-0">
            <h5 class="card-title">SMTP</h5>
        </div>
        <form action="{{route('setting.smtp.update', $smtp->id)}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    {{-- MAIL MAILER --}}
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label">MAIL MAILER</label>
                        <input type="text" value="{{$smtp->mail_mailer}}" name="mail_mailer" class="form-control"
                            placeholder="Enter Mail Mailer Ex. smtp" />
                        @error('mail_mailer')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- MAIL HOST --}}
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label">MAIL HOST</label>
                        <input type="text" value="{{$smtp->mail_host}}" name="mail_host" class="form-control"
                            placeholder="Enter Mail Host Ex. sandbox.smtp.mailtrap.io" />
                        @error('mail_host')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- MAIL PORT --}}
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label">MAIL POST</label>
                        <input type="number" value="{{$smtp->mail_port}}" name="mail_port" class="form-control"
                            placeholder="Enter Mail Port Ex. 2525" />
                        @error('mail_port')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- MAIL FROM ADDRESS --}}
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label">MAIL FROM ADDRESS</label>
                        <input type="text" value="{{$smtp->mail_from_address}}" name="mail_from_address"
                            class="form-control" placeholder="Enter Mail Host Ex. mailfromaddress@gmail.com" />
                        @error('mail_from_address')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- MAIL USERNAME --}}
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label">MAIL USERNAME</label>
                        <input type="text" value="{{\Illuminate\Support\Str::limit($smtp->mail_username, 7, '******')}}"
                            name="mail_username" class="form-control" placeholder="Enter Mail Username" />
                        @error('mail_username')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- MAIL PASSWORD --}}
                    <div class="col-md-6 col-12 mb-3">
                        <label class="form-label">MAIL PASSWORD</label>
                        <input type="password"
                            value="{{\Illuminate\Support\Str::limit($smtp->mail_password, 15, '**************')}}"
                            name="mail_password" class="form-control" placeholder="Enter Mail Mailer Ex. smtp" />
                        @error('mail_password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer pt-0">
                <button type="submit" class="btn btn-primary">Update SMTP</button>
            </div>
        </form>
    </div>
</div>
@endsection
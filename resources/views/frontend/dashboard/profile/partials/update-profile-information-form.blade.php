<div class="card bg-white shadow-sm rounded">
    <div class="card-body">
        {{-- Profile info text --}}
        <div>
            <h3 class="">
                {{ __('Profile Information') }}
            </h3>
            <p class="">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>

        {{-- Send Verification notification --}}
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        {{-- Profile information Update form --}}
        <form method="post" action="{{ route('dashboard.profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            <div class="form-group">
                <label>Name</label>
                <input id="name" name="name" type="text" class="form-control" value="{{old('name', $user->name)}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input id="email" name="email" type="email" class="form-control" value="{{old('email', $user->email)}}">

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                    <p class="">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                </div>
                @endif
            </div>

            <div>
                <button type="submit" class="btn btn-dark">Save</button>
                @if (session('status') === 'profile-updated')
                <p class="mt-2 text-success profile-updated">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</div>
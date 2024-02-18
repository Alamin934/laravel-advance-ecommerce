<div class="card bg-white shadow-sm rounded mt-4">
    <div class="card-body">
        {{-- Update Password info text --}}
        <div>
            <h3 class="">
                {{ __('Update Password') }}
            </h3>
            <p class="">
                {{ __("Ensure your account is using a long, random password to stay secure.") }}
            </p>
        </div>
        {{-- User Update Password form --}}
        <form method="post" action="{{ route('password.update') }}" class="">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" class="form-control" id="update_password_current_password"
                    name="current_password" autocomplete="current-password">
            </div>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control" id="update_password_password" name="password"
                    autocomplete="new-password">
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" id="update_password_password_confirmation"
                    name="password_confirmation" autocomplete="new-password">
            </div>


            <div>
                <button type="submit" class="btn btn-dark password-update">Save</button>
                @if (session('status') === 'password-updated')
                <p class="mt-2 text-success">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</div>


{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}
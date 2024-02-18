<div class="card bg-white shadow-sm rounded mt-4">
    <div class="card-body">
        {{-- Delete Account info text --}}
        <div>
            <h3 class="">
                {{ __('Delete Account') }}
            </h3>
            <p class="">
                {{ __("Once your account is deleted, all of its resources and data will be permanently deleted. Before
                deleting your account, please download any data or information that you wish to retain.") }}
            </p>
        </div>

        {{-- Account Delete Button --}}
        <div>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#accountDelete">Delete
                Account</button>
            @error('password')
            <span class="text-danger d-block">{{$message}}</span>
            @enderror

            {{-- Delete Account Confirm Password Modal --}}
            <form method="post" class="p-6">
                @csrf
                @method('delete')
                <div class="modal fade" id="accountDelete" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Delete Account</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <h3 class="text-lg font-medium text-gray-900">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h3>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __('Once your account is deleted, all of its resources and data will be
                                    permanently deleted. Please
                                    enter your password to confirm you would like to permanently delete your account.')
                                    }}
                                </p>

                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter current password">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
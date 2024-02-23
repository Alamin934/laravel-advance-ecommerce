{{-- User Edit Modal Start --}}
<div class="mt-3">
    <!-- Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="error-msg px-4"></div>

                <form method="POST" id="updateUser">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="update_id" id="update_id">
                            {{-- User Name --}}
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="update_name" id="update_name" class="form-control"
                                    placeholder="Enter User Name" />
                            </div>
                            {{-- User Email --}}
                            <div class="col-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="update_email" id="update_email" class="form-control"
                                    placeholder="Enter User Email" />
                            </div>
                            {{-- User Password --}}
                            <div class="col-12 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="update_password" id="update_password" class="form-control"
                                    placeholder="Enter User Password" />
                            </div>
                            {{-- User Description --}}
                            <div class="col-12 mb-3">
                                <label for="roles" class="form-label">Roles</label>
                                <select class="form-select" multiple id="update_roles" name="update_roles[]">
                                    <option value="0">Select</option>
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" onsubmit="return false" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
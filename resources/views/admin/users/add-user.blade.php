{{-- User Add Modal Start --}}
<div class="mt-3">
    <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="error-msg px-4"></div>

                <form action="" method="POST" id="submitUser">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            {{-- User Name --}}
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter User Name" />
                            </div>
                            {{-- User Email --}}
                            <div class="col-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter User Email" />
                            </div>
                            {{-- User Password --}}
                            <div class="col-12 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter User Password" />
                            </div>
                            {{-- User Description --}}
                            <div class="col-12 mb-3">
                                <label for="roles" class="form-label">Roles</label>
                                <select class="form-select" multiple name="roles[]">
                                    <option selected @disabled(true)>Select roles</option>
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
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
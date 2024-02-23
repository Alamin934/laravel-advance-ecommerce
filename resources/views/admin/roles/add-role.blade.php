{{-- Role Add Modal Start --}}
<div class="mt-3">
    <!-- Modal -->
    <div class="modal fade" id="addRole" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="error-msg px-4"></div>

                <form action="" method="POST" id="submitRole">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            {{-- Role Name --}}
                            <div class="col-12 mb-3">
                                <label for="role" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter Role Name" />
                            </div>
                            {{-- Role Description --}}
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    placeholder="Enter Role Description" />
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
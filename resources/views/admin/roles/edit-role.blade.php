{{-- Role Edit Modal Start --}}
<div class="mt-3">
    <!-- Modal -->
    <div class="modal fade" id="editRole" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="error-msg px-4"></div>

                <form method="POST" id="updateRole">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="update_id" id="update_id">
                            {{-- Role Name --}}
                            <div class="col-12 mb-3">
                                <label for="role" class="form-label">Name</label>
                                <input type="text" name="update_name" id="update_name" class="form-control"
                                    placeholder="Enter Role Name" />
                            </div>
                            {{-- Role Description --}}
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="update_desc" id="update_desc" class="form-control"
                                    placeholder="Enter Role Description" />
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
{{-- Coupon Edit Modal Start --}}
<div class="mt-3">
    <!-- Modal -->
    <div class="modal fade" id="editCoupon" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="error-msg px-4"></div>

                <form method="POST" id="updateCoupon">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="up_id" id="up_id">
                            {{-- Coupon Code --}}
                            <div class="col-12 mb-3">
                                <label for="coupon_code" class="form-label">Coupon Code</label>
                                <input type="text" name="up_coupon_code" id="up_coupon_code" class="form-control"
                                    placeholder="Enter Coupon Code" />
                            </div>
                            {{-- Valid Date --}}
                            <div class="col-12 mb-3">
                                <label for="valid_date" class="form-label">Valid Date</label>
                                <input type="date" name="up_valid_date" id="up_valid_date" class="form-control"
                                    placeholder="Enter Coupon Code" />
                            </div>
                            {{-- Coupon Amount --}}
                            <div class="col-12 mb-3">
                                <label for="coupon_amount" class="form-label">Coupon Amount</label>
                                <input type="number" name="up_coupon_amount" id="up_coupon_amount" class="form-control"
                                    placeholder="Enter Coupon Amount" />
                            </div>
                            {{-- Coupon Status --}}
                            <div class="col-12 mb-3">
                                <label for="coupon_status" class="form-label">Coupon Status</label>
                                <select type="text" name="up_coupon_status" id="up_coupon_status" class="form-select">
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
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
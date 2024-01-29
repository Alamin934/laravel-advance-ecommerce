{{-- Coupon Add Modal Start --}}
<div class="mt-3">
    <!-- Modal -->
    <div class="modal fade" id="addCoupon" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="error-msg px-4"></div>

                <form action="" method="POST" id="submitCoupon">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            {{-- Coupon Code --}}
                            <div class="col-12 mb-3">
                                <label for="coupon_code" class="form-label">Coupon Code</label>
                                <input type="text" name="coupon_code" id="coupon_code" class="form-control"
                                    placeholder="Enter Coupon Code" />
                            </div>
                            {{-- Valid Date --}}
                            <div class="col-12 mb-3">
                                <label for="valid_date" class="form-label">Valid Date</label>
                                <input type="date" name="valid_date" id="valid_date" class="form-control"
                                    placeholder="Enter Coupon Code" />
                            </div>
                            {{-- Coupon Amount --}}
                            <div class="col-12 mb-3">
                                <label for="coupon_amount" class="form-label">Coupon Amount</label>
                                <input type="number" name="coupon_amount" id="coupon_amount" class="form-control"
                                    placeholder="Enter Coupon Amount" />
                            </div>
                            {{-- Coupon Status --}}
                            <div class="col-12 mb-3">
                                <label for="coupon_status" class="form-label">Coupon Status</label>
                                <select type="text" name="coupon_status" id="coupon_status" class="form-select">
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
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
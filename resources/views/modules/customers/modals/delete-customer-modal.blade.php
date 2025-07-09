<form method="POST" id="form-delete-customer">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title text-center" id="modalTopTitle"><i class="bx bx-user me-1"></i>Edit Customer Record
        </h5>
    </div>
    <div class="modal-body ">
        <div class="row">
            <div class="col mb-3">
                <input type="hidden" id="customer-id" name="customer-id" class="form-control" autocomplete="off"
                    value="{{ $customers->CustomerID }}" />
                <label for="nameSlideTop" class="form-label"><strong>Do you want to delete this
                        customer?</strong></label>
            </div>
        </div>
    </div>
    <div class="modal-footer align-items-center justify-content-center">
        <button type="submit" class="btn btn-success text-white">Confirm</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
    </div>
</form>

<form method="POST" id="form-edit-product-brand">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title text-center" id="modalTopTitle"><i class="bx bx-receipt me-1"></i>Edit Product Brand
        </h5>
    </div>
    <div class="modal-body ">
        <div class="row">
            <input type="hidden" id="brand-id" name="brand-id" class="form-control" value="{{ $brand->BrandID }}" />
            <div class="col mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Product Brand: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="edit-product-brand" name="edit-product-brand" class="form-control"
                    placeholder="Enter product brand" autocomplete="off" value="{{ $brand->Brand }}" />
            </div>
        </div>
    </div>
    <div class="modal-footer align-items-center justify-content-center">
        <button type="submit" class="btn btn-success text-white">Confirm</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
    </div>
</form>

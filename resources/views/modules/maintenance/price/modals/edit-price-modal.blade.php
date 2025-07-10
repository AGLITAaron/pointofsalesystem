<form method="POST" id="form-edit-price">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title text-muted font-bold text-center" id="modalTopTitle"><i
                class="bx bx-user-plus me-1"></i>Price
        </h5>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col mb-3">
                <input type="hidden" id="price-id" name="price-id" class="form-control"
                    value="{{ $price->PriceID }}" />
                <label for="nameSlideTop" class="form-label"><strong>Weight <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="weight" name="weight" class="form-control" placeholder="Enter weight"
                    autocomplete="off" value="{{ $price->Weight }}" />
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Price <span
                            class="text-danger">*</span></strong></label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Enter price"
                    autocomplete="off" value="{{ $price->Price }}" />
            </div>
        </div>
    </div>
    <div class="modal-footer align-items-center justify-content-center">
        <button type="submit" class="btn btn-success text-white">Confirm</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
    </div>
</form>

<form method="POST" id="form-delete-price">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title text-muted font-bold text-center" id="modalTopTitle"><i
                class="bx bx-user-plus me-1"></i>Delete
            Price
        </h5>
    </div>
    <div class="modal-body ">
        <div class="row">
            <div class="col mb-3">
                <input type="hidden" id="price-id" name="price-id" class="form-control" autocomplete="off"
                    value="{{ $price->PriceID }}" />
                <label for="nameSlideTop" class="form-label"><strong>Do you want to delete this price?</strong></label>
            </div>
        </div>
    </div>
    <div class="modal-footer align-items-center justify-content-center">
        <button type="submit" class="btn btn-success text-white">Confirm</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
    </div>
</form>

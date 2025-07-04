<form method="POST" id="form-delete-product-category">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title text-center" id="modalTopTitle"><i class="bx bx-receipt me-1"></i>Edit Product Category
        </h5>
    </div>
    <div class="modal-body ">
        <div class="row">
            <div class="col mb-3">
                <input type="hidden" id="category-id" name="category-id"
                    class="form-control"value="{{ $category->CategoryID }}" />

                <p class="text-center text-2xl font-bold">Do you want to delete this?</p>
            </div>
        </div>
    </div>
    <div class="modal-footer align-items-center justify-content-center">
        <button type="submit" class="btn btn-success text-white" id="confirm">Confirm</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
    </div>
</form>

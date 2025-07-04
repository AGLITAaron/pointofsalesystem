<form method="POST" id="form-delete-role">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title text-muted font-bold text-center" id="modalTopTitle"><i
                class="bx bx-user-plus me-1"></i>Delete
            Role
        </h5>
    </div>
    <div class="modal-body ">
        <div class="row">
            <div class="col mb-3">
                <input type="hidden" id="role-id" name="role-id" class="form-control" autocomplete="off"
                    value="{{ $role->RoleID }}" />
                <label for="nameSlideTop" class="form-label"><strong>Do you want to delete this role?</strong></label>
            </div>
        </div>
    </div>
    <div class="modal-footer align-items-center justify-content-center">
        <button type="submit" class="btn btn-success text-white">Confirm</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
    </div>
</form>

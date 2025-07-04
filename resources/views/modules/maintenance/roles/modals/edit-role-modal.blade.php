<form method="POST" id="form-edit-role">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title text-muted font-bold text-center" id="modalTopTitle"><i
                class="bx bx-user-plus me-1"></i>Edit
            Role
        </h5>
    </div>
    <div class="modal-body ">
        <div class="row">
            <div class="col mb-3">
                <input type="hidden" id="role-id" name="role-id" class="form-control" autocomplete="off"
                    value="{{ $role->RoleID }}" />

                <label for="nameSlideTop" class="form-label"><strong>Add New Role: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="edit-role" name="edit-role" class="form-control" placeholder="Enter new role"
                    autocomplete="off" value="{{ $role->Role }}" />
            </div>
        </div>
    </div>
    <div class="modal-footer align-items-center justify-content-center">
        <button type="submit" class="btn btn-success text-white">Confirm</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
    </div>
</form>

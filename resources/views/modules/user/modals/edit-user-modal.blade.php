<form method="POST" id="form-edit-user">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title text-muted font-bold text-center" id="modalTopTitle"><i
                class="bx bx-user-plus me-1"></i>Register
            New Account
        </h5>
    </div>
    <div class="modal-body ">
        <div class="row">
            <div class="col mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Firstname: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="first-name" name="first-name" class="form-control"
                    placeholder="Enter firstname" autocomplete="off" value={{ $users->FName }} />
            </div>
            <div class="col mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Middlename: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="middle-name" name="middle-name" class="form-control"
                    placeholder="Enter middlename" autocomplete="off" value={{ $users->MName }} />
            </div>
            <div class="col mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Lastname: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="last-name" name="last-name" class="form-control" placeholder="Enter lastname"
                    autocomplete="off" value={{ $users->LName }} />
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Birthday: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="birthday" name="birthday" class="form-control" placeholder="Enter birthday"
                    autocomplete="off" disabled value={{ $users->Birthday }} />
            </div>
            <div class="col mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Contact Number: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="contact-number" name="contact-number" class="form-control"
                    placeholder="Enter contact number" autocomplete="off" disabled />
            </div>
            <div class="col mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Email: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter email"
                    autocomplete="off" disabled />
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Account Status: <span
                            class="text-danger">*</span></strong></label>
                <select id="account-status" name="account-status" class="form-control">
                    <option value="">-- Select --</option>
                    <option value="0">In Active</option>
                    <option value="1">Active</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label" for="password"><strong>Username: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" class="form-control password" name="username" id="username-code"
                    placeholder="Enter username" aria-describedby="username" autocomplete="off" disabled
                    value={{ $users->Username }}>
            </div>
            <div class="col mb-3">
                <label class="form-label" for="password"><strong>Password: <span
                            class="text-danger">*</span></strong></label>
                <input type="password" class="form-control password password" name="password" id="password"
                    placeholder="············" aria-describedby="password" autocomplete="off" disabled
                    value={{ $users->Password }}>
            </div>
        </div>
    </div>
    <div class="modal-footer align-items-center justify-content-center">
        <button type="submit" class="btn btn-success text-white">Confirm</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
    </div>
</form>

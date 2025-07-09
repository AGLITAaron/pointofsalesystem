<form method="POST" id="form-add-employee">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title text-center" id="modalTopTitle"><i class="bx bx-user me-1"></i>Create Customer Record
        </h5>
    </div>
    <div class="modal-body ">
        <div class="row">
            <div class="col-6 mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Name: <span
                            class="text-danger">*</span></strong></label>
                <select id="name" name="name" class="form-select">
                    <option value="">-- Select --</option>
                    @foreach ($users as $list)
                        <option value="{{ $list->UserID }}">{{ $list->FName . ' ' . $list->MName . ' ' . $list->LName }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Contact Number: <span
                            class="text-danger">*</span></strong></label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon11">+63</span>
                    <input type="text" id="contact-number" name="contact-number" class="form-control"
                        placeholder="Enter contact number" autocomplete="off" />
                </div>
            </div>
            <div class="col-6 mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Gender: <span
                            class="text-danger">*</span></strong></label>
                <select id="gender" name="gender" class="form-select">
                    <option value="">-- Select --</option>
                    @foreach ($gender as $list)
                        <option value="{{ $list->GenderID }}">{{ $list->Gender }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">

            <div class="col-4 mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Salary: <span
                            class="text-danger">*</span></strong></label>
                <select id="salary" name="salary" class="form-select">
                    <option value="">-- Select --</option>
                    @foreach ($salary as $list)
                        <option value="{{ $list->SalaryID }}">₱ {{ number_format($list->Salary, 2) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Complete Address: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="complete-address" name="complete-address" class="form-control"
                    placeholder="Enter complete address" autocomplete="off" />
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Province: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="province" name="province" class="form-control" placeholder="Enter province"
                    autocomplete="off" />
            </div>
            <div class="col-4 mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Municipality: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="municipality" name="municipality" class="form-control"
                    placeholder="Enter municipality" autocomplete="off" />
            </div>
            <div class="col-4 mb-3">
                <label for="nameSlideTop" class="form-label"><strong>Barangay: <span
                            class="text-danger">*</span></strong></label>
                <input type="text" id="barangay" name="barangay" class="form-control" placeholder="Enter barangay"
                    autocomplete="off" />
            </div>
        </div>

    </div>
    <div class="modal-footer align-items-center justify-content-center">
        <button type="submit" class="btn btn-success text-white">Confirm</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
    </div>
</form>

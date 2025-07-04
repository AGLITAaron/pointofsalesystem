@section('title', 'Create Account')
@include('includes.head')
<div class="container-xxl">
    <div class="authentication-wrapper container-p-y">
        <div class="authentication-inner">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center mb-5">
                                <span class="app-brand-text text-body fw-bolder ">Create account</span>
                            </div>
                            <form method="POST" id="registert-form" class="mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Firstname<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="firstname" name="firstname"
                                                placeholder="Enter your firstname" autofocus autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="middlename" class="form-label">Middlename</label>
                                            <input type="text" class="form-control" id="middlename" name="middlename"
                                                placeholder="Enter your middlename" autofocus autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Lastname<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lastname" name="lastname"
                                                placeholder="Enter your lastname" autofocus autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="birthday" class="form-label">Birthday<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="birthday" name="birthday"
                                                placeholder="Enter your lastname" autofocus autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="cellphone-number" class="form-label">Cellphone number<span
                                                class="text-danger">*</span></label>
                                        <div class="mb-3 input-group">
                                            <span class="input-group-text" id="number-mask"
                                                name="number-mask"value="+63"> +63</span>
                                            <input type="text" class="form-control" id="cellphone-number"
                                                name="cellphone-number" placeholder="Enter your cellphone number"
                                                autofocus autocomplete="off" oninput="validateCellphone(this)" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="Username" class="form-label">Username<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Enter your username" autofocus autocomplete="off" />
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="Password">Password<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" autocomplete="off" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="confirm password">Confirm Password<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="confirm-password" class="form-control"
                                            name="confirm-password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="confirm-password" autocomplete="off" />
                                        <span class="input-group-text cursor-pointer"><i
                                                class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary d-grid w-100" id="register-btn"
                                        type="button">Create account</button>
                                </div>
                            </form>
                            <p class="text-center">
                                <span>Already have an account?</span>
                                <a href="{{ route('login') }}">
                                    <span>Sign in here</span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Click on button triggers doLogin
        $(document).on('submit', '#registert-form', function(e) {
            e.preventDefault();

            const formData = $(this).serialize();
            doRegistration(formData);
        });

        // AJAX login function
        function doRegistration(formData) {

            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var birthday = $('#birthday').val();
            var cellphoneNumber = $('#cellphone-number').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var confirm_password = $('#confirm-password').val();
            // var formData = new FormData($('#form-authentication')[0]);
            if (firstname == '') {
                Swal.fire({
                    text: 'Firstname is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (lastname == '') {
                Swal.fire({
                    text: 'Lastname is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (birthday == '') {
                Swal.fire({
                    text: 'Birthday is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (cellphoneNumber == '') {
                Swal.fire({
                    text: 'Cellphone number is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (username == '') {
                Swal.fire({
                    text: 'Username is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (password == '') {
                Swal.fire({
                    text: 'Password is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (confirm_password == '') {
                Swal.fire({
                    text: 'Confirm password is required.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (confirm_password != password) {
                Swal.fire({
                    text: 'Password do not match.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else {
                $.ajax({
                    url: "{{ route('register-user') }}",
                    method: 'POST',
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        if (response.status == 'success') {
                            Swal.fire({
                                html: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK',
                            }).then((result) => {
                                window.location = "{{ route('login') }}"
                            });

                        } else {
                            Swal.fire({
                                html: response.message,
                                icon: 'warning',
                                confirmButtonText: 'OK',
                            });

                        }
                    },
                });
            }
        }
    });


    function validateCellphone(input) {
        let cleaned = input.value.replace(/\D/g, '');

        // If first digit is not 9, reject it entirely
        if (cleaned.length > 0 && cleaned.charAt(0) !== '9') {
            cleaned = '';
        }

        // Limit to 10 digits
        if (cleaned.length > 10) {
            cleaned = cleaned.slice(0, 10);
        }

        input.value = cleaned;
    }
</script>

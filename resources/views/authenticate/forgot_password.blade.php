@section('title', 'Login')
@include('includes.head')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <span class="app-brand-text text-body fw-bolder ">Reset your password</span>
                    </div>
                    <!-- /Logo -->
                    {{-- <h4 class="mb-2">Welcome to Sneat! 👋</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

                    <form method="POST" id="form-reset-password" class="mb-3">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your username" autocomplete="off" />
                        </div>
                        <div class="mb-3">

                            <div class="d-flex justify-content-between">
                                <label for="current-password" class="form-label">Current Password <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" id="current-password"
                                    name="current-password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    autocomplete="off" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="new-password">New Password <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="new-password" class="form-control" name="new-password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" autocomplete="off" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary d-grid w-100" id="reset-btn"
                                type="button">Reset Password</button>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('login') }}" class="btn btn-secondary d-grid w-100" id="login-btn">Back to
                                login</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Register -->
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
        $(document).on('submit', '#form-reset-password', function(e) {
            e.preventDefault();

            const formData = $(this).serialize();
            doLogin(formData);
        });

        // AJAX login function
        function doLogin(formData) {

            var username = $('#username').val();
            var currentPassword = $('#current-password').val();
            var newPassword = $('#new-password').val();
            // var formData = new FormData($('#form-authentication')[0]);

            if (username == '') {
                swal.fire({
                    text: 'Username is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (currentPassword == '') {
                swal.fire({
                    text: 'Current password is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (newPassword == '') {
                swal.fire({
                    text: 'New password is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else {
                $.ajax({
                    url: "{{ route('reset-password') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status == 'success') {
                            swal.fire({
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK',
                            });

                        } else {
                            swal.fire({
                                text: response.message,
                                icon: 'warning',
                                confirmButtonText: 'OK',
                            });
                        }
                    },
                });

            }
        }
    });
</script>

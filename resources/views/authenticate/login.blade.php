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
                        <span class="app-brand-text text-body fw-bolder ">Accounting System</span>
                    </div>
                    <!-- /Logo -->
                    {{-- <h4 class="mb-2">Welcome to Sneat! 👋</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

                    <form method="POST" id="form-authentication" class="mb-3">
                        <div class="mb-3">
                            <label for="Username" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your username" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="Password">Password <span
                                        class="text-danger">*</span></label>
                                <a href="{{ route('forgot-passowrd') }}">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary d-grid w-100" id="login-btn"
                                type="button">Sign in</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Don't have an account?</span>
                        <a href="{{ route('register-account') }}">
                            <span>Create an account</span>
                        </a>
                    </p>
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
        $(document).on('submit', '#form-authentication', function(e) {
            e.preventDefault();

            const formData = $(this).serialize();
            doLogin(formData);
        });

        // AJAX login function
        function doLogin(formData) {

            var username = $('#username').val();
            var password = $('#password').val();
            // var formData = new FormData($('#form-authentication')[0]);

            if (username == '') {
                swal.fire({
                    text: 'Username is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else if (password == '') {
                swal.fire({
                    text: 'Password is required',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            } else {
                $.ajax({
                    url: "{{ route('authenticate') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status == 'success') {
                            location.href = response.intendedUrl;

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

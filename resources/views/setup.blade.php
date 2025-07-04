@section('title', 'Database Setup')
@include('includes.head')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <span class="app-brand-text text-body fw-bolder ">Database Configuration</span>
                    </div>
                    <!-- /Logo -->
                    {{-- <h4 class="mb-2">Welcome to Sneat! 👋</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

                    <form method="POST" id="form-authentication" class="mb-3" action="{{ route('setup.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="db-host" class="form-label">DB Host: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="db-host" name="db-host"
                                placeholder="Enter database host" autofocus />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="db-port">DB Port: <span class="text-danger">*</span></label>
                            <input type="text" id="db-port" class="form-control" name="db-port"
                                placeholder="Enter database port" aria-describedby="" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="db-name">DB Name: <span class="text-danger">*</span></label>
                            <input type="text" id="db-name" class="form-control" name="db-name"
                                placeholder="Enter database name" aria-describedby="" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="db-username">DB Username: <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="db-username" class="form-control" name="db-username"
                                placeholder="Enter database username" aria-describedby="" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="Password">DB Password: <span
                                    class="text-danger">*</span></label>
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary d-grid w-100" id="config-btn">Save
                                Configuration</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

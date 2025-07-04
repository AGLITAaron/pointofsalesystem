@extends('app')
@section('title', 'Product List')
<!-- Contents -->
@section('content')
    <!-- Content -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="card p-3">
                                <div class="d-flex justify-content-between align-items-center text-base">Product Unit List
                                    <a href=""
                                        class="btn btn-success btn-success text-white d-flex align-items-center">
                                        <i class="bx bx-plus-circle me-1"></i> Create Product Unit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1">Total Products</p>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

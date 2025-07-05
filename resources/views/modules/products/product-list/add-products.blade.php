@extends('app')
@section('title', 'Create Products')
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
                                <div class="d-flex justify-content-between align-items-center text-base">Create Products
                                    <a href="{{ route('products.list') }}"
                                        class="btn btn-dark text-white d-flex align-items-center">
                                        <i class="bx bx-plus-circle me-1"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 mb-3">
                            <div class="card mb-6">
                                <form class="card-body">
                                    <div class="row g-6 mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-username">Product Product Name</label>
                                            <input type="text" id="product-name" name="product-name" class="form-control"
                                                placeholder="Enter Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-email">Product Code</label>
                                            <input type="text" id="multicol-email" class="form-control"
                                                placeholder="Enter Product Code">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-email">Product Image</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="multicol-email" class="form-control"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    aria-describedby="multicol-email2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-6 mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-username">Product Category</label>
                                            <input type="text" id="multicol-username" class="form-control"
                                                placeholder="john.doe">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-email">Product Brand</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="multicol-email" class="form-control"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    aria-describedby="multicol-email2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-6 mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-username">Barcode Symbology</label>
                                            <input type="text" id="multicol-username" class="form-control"
                                                placeholder="john.doe">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-email">Product Unit</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="multicol-email" class="form-control"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    aria-describedby="multicol-email2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-6 mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-username">Sale Unit</label>
                                            <input type="text" id="multicol-username" class="form-control"
                                                placeholder="john.doe">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-email">Purchase Unit</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="multicol-email" class="form-control"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    aria-describedby="multicol-email2">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-email">Warehouse</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="multicol-email" class="form-control"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    aria-describedby="multicol-email2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-6 mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-username">Quantity Limitation</label>
                                            <input type="text" id="multicol-username" class="form-control"
                                                placeholder="john.doe">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-email">Note</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="multicol-email" class="form-control"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    aria-describedby="multicol-email2">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-email">Supplier</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="multicol-email" class="form-control"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    aria-describedby="multicol-email2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-6">
                                        <div class="col-md-4">
                                            <label class="form-label" for="multicol-username">Status</label>
                                            <input type="text" id="multicol-username" class="form-control"
                                                placeholder="john.doe">
                                        </div>
                                    </div>
                                    <div class="pt-6">
                                        <button type="submit" class="btn btn-primary me-3">Submit</button>
                                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection

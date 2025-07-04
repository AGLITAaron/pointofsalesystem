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
                                <div class="d-flex justify-content-between align-items-center text-base">Items/Products List
                                    <a href="{{ route('create-product') }}"
                                        class="btn btn-success btn-success text-white d-flex align-items-center">
                                        <i class="bx bx-plus-circle me-1"></i> Create Product
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1">Total Products</p>
                                    <h4 class="card-title mb-3">{{ $totalProducts }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1">Total Amount</p>
                                    <h4 class="card-title mb-3">₱ {{ $totalAmount->TotalAmount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 mb-3">
                    <div class="card h-100">
                        <div class="table-responsive text-nowrap p-2">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Product Code
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Product Name
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Quantity
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Price
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Product Description
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 ">
                                    @if (count($products) > 0)
                                        @foreach ($products as $list)
                                            <tr>
                                                <td class="text-xs text-center p-1">{{ $list->ProductCode }}
                                                <td class="text-xs text-center p-1">{{ $list->ProductName }}
                                                <td class="text-xs text-center p-1">{{ $list->Quantity }}
                                                <td class="text-xs text-center p-1">{{ $list->Amount }}
                                                <td class="text-xs text-center p-1">{{ $list->ProductDesctiption }}
                                                </td>
                                                <td class="text-center p-1 whitespace-nowrap">
                                                    <button class="btn btn-outline-success p-1 income-edit-btn"
                                                        data-item-id="{{ $list->ProductID }}" data-bs-toggle="modal"
                                                        data-bs-target="#edit-income-modal"><i class='bx bx-pencil'></i>
                                                    </button>

                                                    <button class="btn btn-outline-info p-1 income-view-btn"
                                                        data-item-id="{{ $list->ProductID }}" data-bs-toggle="modal"
                                                        data-bs-target="#view-income-modal"><i
                                                            class='bx bx-folder-open'></i>
                                                    </button>

                                                    <button class="btn btn-outline-danger p-1 income-delete-btn"
                                                        data-item-id="{{ $list->ProductID }}" data-bs-toggle="modal"
                                                        data-bs-target="#delete-income-modal"><i class='bx bx-trash'></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="100" class="text-center text-sm"><span>No records
                                                    found</span>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="100" class="text-sm text-right">
                                        {{ $products->appends(['query' => request()->query('query')])->links() }}
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

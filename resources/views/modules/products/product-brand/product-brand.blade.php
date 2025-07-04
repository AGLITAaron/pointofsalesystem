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
                                <div class="d-flex justify-content-between align-items-center text-base">Product Brands
                                    <button class="btn btn-success btn-success text-white d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#add-product-brand">
                                        <i class="bx bx-plus-circle me-1"></i> Create Product Brand
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            Product Brand
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 ">
                                    @if (count($brand) > 0)
                                        @foreach ($brand as $list)
                                            <tr>
                                                <td class="text-xs text-center p-1">{{ $list->Brand }}
                                                <td class="text-center p-1 whitespace-nowrap">
                                                    <button class="btn btn-outline-success p-1 product-brand-edit-btn"
                                                        data-item-id="{{ $list->BrandID }}" data-bs-toggle="modal"
                                                        data-bs-target="#edit-product-brand-modal"><i
                                                            class='bx bx-pencil'></i>
                                                    </button>

                                                    <button class="btn btn-outline-info p-1 product-brand-view-btn"
                                                        data-item-id="{{ $list->BrandID }}" data-bs-toggle="modal"
                                                        data-bs-target="#view-product-brand-modal"><i
                                                            class='bx bx-folder-open'></i>
                                                    </button>

                                                    <button class="btn btn-outline-danger p-1 product-brand-delete-btn"
                                                        data-item-id="{{ $list->BrandID }}" data-bs-toggle="modal"
                                                        data-bs-target="#delete-product-brand-modal"><i
                                                            class='bx bx-trash'></i>
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
                                        {{ $brand->appends(['query' => request()->query('query')])->links() }}
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add modal --}}
    <div class="modal fade" id="add-product-brand" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content add-product-brand-modal-content modal-md">
            @include('modules.products.modals.product-brand.add-product-brand-modal')
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="edit-product-brand-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content edit-product-brand-modal-content modal-md">

        </div>
    </div>


    {{-- delete modal --}}
    <div class="modal fade" id="delete-product-brand-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content delete-product-brand-modal-content modal-md">

        </div>
    </div>

    @include('modules.products.scripts.product-brand.product-brand-scripts')
@endsection

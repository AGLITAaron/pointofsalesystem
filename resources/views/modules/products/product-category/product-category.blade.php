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
                                <div class="d-flex justify-content-between align-items-center text-base">Products Category
                                    <button class="btn btn-success btn-success text-white d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#add-product-category">
                                        <i class="bx bx-plus-circle me-1"></i> Create Product Category
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
                                            Product Category
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 ">
                                    @if (count($category) > 0)
                                        @foreach ($category as $list)
                                            <tr>
                                                <td class="text-xs text-center p-1">{{ $list->Category }}
                                                <td class="text-center p-1 whitespace-nowrap">
                                                    <button class="btn btn-outline-success p-1 product-category-edit-btn"
                                                        data-item-id="{{ $list->CategoryID }}" data-bs-toggle="modal"
                                                        data-bs-target="#edit-product-category-modal"><i
                                                            class='bx bx-pencil'></i>
                                                    </button>

                                                    <button class="btn btn-outline-info p-1 product-category-view-btn"
                                                        data-item-id="{{ $list->CategoryID }}" data-bs-toggle="modal"
                                                        data-bs-target="#view-product-category-modal"><i
                                                            class='bx bx-folder-open'></i>
                                                    </button>

                                                    <button class="btn btn-outline-danger p-1 product-category-delete-btn"
                                                        data-item-id="{{ $list->CategoryID }}" data-bs-toggle="modal"
                                                        data-bs-target="#delete-product-category-modal"><i
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
                                        {{ $category->appends(['query' => request()->query('query')])->links() }}
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
    <div class="modal fade" id="add-product-category" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content add-product-category-modal-content modal-md">
            @include('modules.products.modals.product-category.add-product-category-modal')
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="edit-product-category-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content edit-product-category-modal-content modal-md">

        </div>
    </div>


    {{-- delete modal --}}
    <div class="modal fade" id="delete-product-category-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content delete-product-category-modal-content modal-md">

        </div>
    </div>

    @include('modules.products.scripts.product-category.product-category-scripts')
@endsection

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
                                <div class="d-flex justify-content-between align-items-center text-base">Maintenance/Price
                                    List
                                    <button class="btn btn-success btn-success text-white d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#add-price-modal">
                                        <i class="bx bx-plus-circle me-1"></i> Create Price List
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
                                            Weight
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Price
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 ">

                                    @if (count($prices) > 0)
                                        @foreach ($prices as $list)
                                            <tr>
                                                <td class="text-xs text-center p-1">{{ $list->Weight }}
                                                <td class="text-xs text-center p-1">{{ $list->Price }}
                                                <td class="text-center p-1 whitespace-nowrap">
                                                    <button class="btn btn-outline-success p-1 price-edit-btn"
                                                        data-item-id="{{ $list->PriceID }}" data-bs-toggle="modal"
                                                        data-bs-target="#edit-price-modal"><i class='bx bx-pencil'></i>
                                                    </button>

                                                    <button class="btn btn-outline-danger p-1 price-delete-btn"
                                                        data-item-id="{{ $list->PriceID }}" data-bs-toggle="modal"
                                                        data-bs-target="#delete-price-modal"><i class='bx bx-trash'></i>
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
                                        {{ $prices->appends(['query' => request()->query('query')])->links() }}
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add price modal --}}
    <div class="modal fade" id="add-price-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content add-price-modal-content modal-md">
            @include('modules.maintenance.price.modals.add-price-modal')
        </div>
    </div>

    {{-- edit price modal --}}
    <div class="modal fade" id="edit-price-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content edit-price-modal-content modal-md">

        </div>
    </div>


    {{-- delete modal --}}
    <div class="modal fade" id="delete-price-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content delete-price-modal-content modal-md">

        </div>
    </div>

    @include('modules.maintenance.price.scripts.price-scripts')
@endsection

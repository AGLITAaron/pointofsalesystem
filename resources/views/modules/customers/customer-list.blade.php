@extends('app')
@section('title', 'Customer List')
<!-- Contents -->
@section('content')
    <!-- Content -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
                {{-- {{ dd($user->toArray(), $user->profileCompletionPercent()) }} --}}
                <div class="col-12 mb-3">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="card p-3">
                                <div class="d-flex justify-content-between align-items-center">Customers List
                                    <button class="btn btn-success btn-success text-white d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#add-customer-modal">
                                        <i class="bx bx-plus-circle me-1"></i> Create Customer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mb-6">
                    <div class="card h-100">
                        <div class="table-responsive text-nowrap p-2">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center font-bold whitespace-nowrap p-1">
                                            Customer Number
                                        </th>
                                        <th class="text-center font-bold whitespace-nowrap p-1">
                                            Customer Name
                                        </th>
                                        <th class="text-center font-bold whitespace-nowrap p-1">
                                            Complete Address
                                        </th>
                                        <th class="text-center font-bold whitespace-nowrap p-1">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 ">
                                    @if (count($customers) > 0)
                                        @foreach ($customers as $list)
                                            <tr>
                                                <td class="text-center p-1 font-bold">{{ $list->CustomerNumber }}</td>
                                                <td class="text-center p-1">{{ $list->CustomerName }}</td>
                                                <td class="text-center p-1">{{ $list->CompleteAddress }}</td>
                                                <td class="text-center p-1 whitespace-nowrap">
                                                    <button class="btn btn-outline-success p-1 edit-customer-btn"
                                                        data-item-id="{{ $list->CustomerID }}" data-bs-toggle="modal"
                                                        data-bs-target="#edit-customer-modal"><i class='bx bx-pencil'></i>
                                                    </button>

                                                    <button class="btn btn-outline-danger p-1 delete-customer-btn"
                                                        data-item-id="{{ $list->CustomerID }}" data-bs-toggle="modal"
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
                                        {{ $customers->appends(['query' => request()->query('query')])->links() }}
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
    <div class="modal fade" id="add-customer-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content add-modal-content modal-lg">
            @include('modules.customers.modals.add-customer-modal')
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="edit-customer-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content edit-customer-modal-content modal-lg">

        </div>
    </div>


    {{-- delete modal --}}
    <div class="modal fade" id="delete-customer-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content delete-customer-modal-content modal-md">

        </div>
    </div>

    @include('modules.customers.scripts.customer-scripts')
@endsection

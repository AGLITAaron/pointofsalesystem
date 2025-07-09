@extends('app')
@section('title', 'Dashboard')
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
                                <div class="d-flex justify-content-between align-items-center text-base">Employee List
                                    <button class="btn btn-success btn-success text-white d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#add-employee-modal">
                                        <i class="bx bx-plus-circle me-1"></i> Create Employee
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
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Employee Name
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Contact number
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Birthday
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Gender
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Salary
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 ">
                                    @if (count($employees) > 0)
                                        @foreach ($employees as $list)
                                            <tr>
                                                <td class="text-xs text-center p-1">
                                                    {{ $list->Users->FName . ' ' . $list->Users->MName . ' ' . $list->Users->LName }}
                                                <td class="text-xs text-center p-1">{{ $list->ContactNumber }}
                                                <td class="text-xs text-center p-1">{{ $list->Users->Birthday }}
                                                <td class="text-xs text-center p-1">{{ $list->Gender->Gender }}
                                                <td class="text-xs text-center p-1">₱
                                                    {{ number_format($list->Salary->Salary, 2) }}
                                                <td class="text-center p-1 whitespace-nowrap">
                                                    <button class="btn btn-outline-success p-1 edit-employee-btn"
                                                        data-item-id="{{ $list->EmployeeID }}" data-bs-toggle="modal"
                                                        data-bs-target="#edit-employee-modal"><i class='bx bx-pencil'></i>
                                                    </button>

                                                    <button class="btn btn-outline-danger p-1 delete-employee-btn"
                                                        data-item-id="{{ $list->EmployeeID }}" data-bs-toggle="modal"
                                                        data-bs-target="#delete-employee-modal"><i class='bx bx-trash'></i>
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
                                        {{ $employees->appends(['query' => request()->query('query')])->links() }}
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add employee modal --}}
    <div class="modal fade" id="add-employee-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content add-modal-content modal-xl">
            @include('modules.employees.modals.add-employee-modal')
        </div>
    </div>

    {{-- edit employee modal --}}
    <div class="modal fade" id="edit-employee-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content edit-employee-content modal-xl">

        </div>
    </div>

    {{-- delete employee modal --}}
    <div class="modal fade" id="delete-employee-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content delete-modal-content modal-md">

        </div>
    </div>

    @include('modules.employees.scripts.employee-scripts')
@endsection

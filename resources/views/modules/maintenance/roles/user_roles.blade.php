@extends('app')
@section('title', 'Dashboard')
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
                                <div class="d-flex justify-content-between align-items-center text-base">Maintenance/User
                                    Roles
                                    <button class="btn btn-success btn-success text-white d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#add-new-role-modal">
                                        <i class="bx bx-plus-circle me-1"></i> Add
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
                                            Roles
                                        </th>
                                        <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 ">
                                    @if (count($roles) > 0)
                                        @foreach ($roles as $list)
                                            <tr>
                                                <td class="text-xs text-center p-1">{{ $list->Role }}
                                                <td class="text-center p-1 whitespace-nowrap">
                                                    <button class="btn btn-outline-success p-1 role-edit-btn"
                                                        data-item-id="{{ $list->RoleID }}" data-bs-toggle="modal"
                                                        data-bs-target="#edit-role-modal"><i class='bx bx-pencil'></i>
                                                    </button>

                                                    <button class="btn btn-outline-danger p-1 role-delete-btn"
                                                        data-item-id="{{ $list->RoleID }}" data-bs-toggle="modal"
                                                        data-bs-target="#delete-role-modal"><i class='bx bx-trash'></i>
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
                                        {{-- {{ $province->appends(['query' => request()->query('query')])->links() }} --}}
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
    <div class="modal fade" id="add-new-role-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content add-modal-content modal-md">
            @include('modules.maintenance.roles.modals.add-new-role-modal')
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="edit-role-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content edit-modal-content modal-md">

        </div>
    </div>


    {{-- delete modal --}}
    <div class="modal fade" id="delete-role-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content delete-modal-content modal-md">

        </div>
    </div>

    @include('modules.maintenance.roles.scripts.user-role-scripts')
@endsection

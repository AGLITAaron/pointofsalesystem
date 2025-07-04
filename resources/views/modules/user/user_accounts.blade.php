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
                                <div class="d-flex justify-content-between align-items-center text-base">User Accounts
                                    {{-- <button class="btn btn-success btn-success text-white d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#add-new-user-modal">
                                        <i class="bx bx-plus-circle me-1"></i> Add
                                    </button> --}}
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
                                                    Username
                                                </th>
                                                <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                                    Firstname
                                                </th>
                                                <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                                    Middlename
                                                </th>
                                                <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                                    Lastname
                                                </th>

                                                <th class="text-center text-sm font-bold whitespace-nowrap p-1">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0 ">
                                            @if (count($users) > 0)
                                                @foreach ($users as $list)
                                                    <tr>
                                                        <td class="text-xs text-center p-1">{{ $list->Username }}
                                                        <td class="text-xs text-center p-1">{{ $list->FName }}
                                                        <td class="text-xs text-center p-1">{{ $list->MName }}
                                                        <td class="text-xs text-center p-1">{{ $list->LName }}
                                                        <td class="text-center p-1 whitespace-nowrap">
                                                            <button class="btn btn-success p-1 user-edit-btn"
                                                                data-item-id="{{ $list->UserID }}" data-bs-toggle="modal"
                                                                data-bs-target="#edit-user-modal"><i
                                                                    class='bx bx-pencil'></i>
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
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-content edit-modal-content modal-lg">

        </div>
    </div>

    @include('modules.user.scripts.user-account-scripts');
@endsection

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
                    {{-- @if (count($missing) > 0)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted p-2">Profile Completion</h5>
                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                {{ round($progress) }}%
                                            </div>
                                        </div>

                                        @if (count($missing) > 0)
                                            <div class="alert alert-warning mt-3">
                                                Please complete the following fields:
                                                {{ implode(', ', $missing) }}
                                            </div>
                                        @else
                                            <div class="alert alert-success mt-3">
                                                Your profile is complete!
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else --}}
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="card p-3">
                                <div class="d-flex justify-content-between align-items-center text-xl">Dashboard
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1 text-lg">Registered Employee</p>
                                    <h4 class="card-title mb-3 text-xl">0</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1 text-lg">Customers</p>
                                    <h4 class="card-title mb-3 text-xl">0</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1 text-lg">Total Transaction</p>
                                    <h4 class="card-title mb-3 text-xl">0
                                        {{-- {{ number_format($totalExpense->TotalExpense, 2) ? number_format($totalExpense->TotalExpense, 2) : 0 }} --}}
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1 text-lg">Pending Transaction</p>
                                    <h4 class="card-title mb-3 text-xl">0
                                        {{-- {{ number_format($totalSavings->TotalAmount) ? number_format($totalSavings->TotalAmount) : 0 }} --}}
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1 text-lg">Income (This Year)</p>
                                    <h4 class="card-title mb-3 text-xl">0
                                        {{-- {{ number_format($totalSavings->TotalAmount) ? number_format($totalSavings->TotalAmount) : 0 }} --}}
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1 text-lg">Expenditure (This Year)</p>
                                    <h4 class="card-title mb-3 text-xl">0
                                        {{-- {{ number_format($totalSavings->TotalAmount) ? number_format($totalSavings->TotalAmount) : 0 }} --}}
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="mb-1 text-lg">Profit (This Year)</p>
                                    <h4 class="card-title mb-3 text-xl">0
                                        {{-- {{ number_format($totalSavings->TotalAmount) ? number_format($totalSavings->TotalAmount) : 0 }} --}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

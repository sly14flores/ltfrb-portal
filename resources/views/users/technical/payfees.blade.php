@extends('layouts.app') 

@section('title', 'Technical')

@section('content')
<div class="row gx-0">
    <!-- Sidebar -->
    <div class="card col-2 card-background h-100 shadow-lg rounded">
        <ul class="list-group sidebar-list fs-5">
            <a href="{{ route('dashboard.index') }}" class="text-decoration-none text-white mb-2">
                <li class="fw-bold d-flex align-items-center p-3 hover-bg-primary rounded">
                    <i class="fa-solid fa-chart-line me-2"></i> Dashboard
                </li>
            </a>
            <a href="{{ route('technical.show') }}" class="text-decoration-none text-white mb-2">
                <li class="fw-bold d-flex align-items-center p-3 hover-bg-primary rounded">
                    <i class="fa-solid fa-box-open me-2"></i> View Applications
                </li>
            </a>
            <a href="#" class="text-decoration-none text-white mb-2">
                <li class="fw-bold d-flex align-items-center p-3 hover-bg-primary rounded">
                    <i class="fa-regular fa-envelope me-2"></i> Reports
                </li>
            </a>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="col-10 w-75 mx-auto">
        <div class="row mt-5">
            <div class="col bg-white p-4 rounded shadow-sm">
                <h1 class="h3 mt-3">Full Name: {{ $application->user->first_name }} {{ $application->user->last_name }}</h1>
                <p class="text-muted">Application Number: {{ $application->app_number }}</p>
                <hr>
                <h3>Fees</h3>
                <p class="text-muted">Penalties and associated fees.</p>

                <form action="{{ route('technical.saveFees')}}" method="post">
                    @csrf
                    <input type="hidden" name="app_id" value="{{ $application->id }}">

                    <!-- Fees Table -->
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Fee Description</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Apply Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_fees as $fee)
                            <tr>
                                <td>{{ $fee->name }}</td>
                                <td>{{ $fee->id > 6 ? '' : '₱' }} {{ $fee->amount }}</td>
                                <td>
                                    @if ($fee->id < 7)
                                    <input type="checkbox" name="fees[{{ $fee->id }}]" id="{{ $fee->name }}" class="form-check-input" value={{ $fee->id }}>
                                    @else
                                    <input type="number" name="custome_fees[{{ $fee->id }}]" id="{{ $fee->name }}" class="form-control" placeholder="₱0.00">
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Additional Fees (Surcharges, Late Confirmation, etc.) -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="surcharges" class="form-label small">Surcharges</label>
                            <input type="number" name="surcharges" id="surcharges" value="{{ old('surcharges', $application->surcharges) }}" class="form-control">
                            @error('surcharges')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="late_confirmation" class="form-label small">Late Confirmation</label>
                            <input type="number" name="late_confirmation" id="late_confirmation" value="{{ old('late_confirmation', $application->late_confirmation) }}" class="form-control">
                            @error('late_confirmation')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="penalties" class="form-label small">Penalties</label>
                            <input type="number" name="penalties" id="penalties" value="{{ old('penalties', $application->penalties) }}" class="form-control">
                            @error('penalties')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="others" class="form-label small">Others</label>
                            <input type="number" name="others" id="others" value="{{ old('others', $application->others) }}" class="form-control">
                            @error('others')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <button class="btn btn-primary ms-auto" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('title', 'Show Fees')

@section('content')
<div class="row gx-0">
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

    <div class="col-10 w-75 mx-auto">
        <div class="row mt-5">
            <div class="col bg-white p-4 rounded shadow-sm">
                <h1 class="h3 mt-3">Full Name: {{ $application->user->first_name }} {{ $application->user->last_name }}</h1>
                
                <a href="{{ route('technical.fees', $application->id) }}" class="btn btn-primary btn-sm mb-3">
                    <i class="fas fa-plus"></i> Add Fees
                </a>
                <hr>

                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Penalties</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($application->applicationFees as $application_fee)
                        <tr>
                            <td>{{ $application_fee->fee->name }}</td>
                            <td>₱{{ number_format($application_fee->fee->amount, 2) }}</td>
                            <td>
                                <form action="{{ route('technical.deletefees', $application_fee->application_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="fee_id" class="btn btn-danger btn-sm" value="{{ $application_fee->fee_id }}">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if ($application->surcharges == 0 && $application->late_confirmation == 0 && $application->penalties == 0 && $application->others == 0)
                            <tr>
                                <td class="fst-italic text-secondary" colspan="3">No other fees (Surcharges, Late Confirmation, Penalties, Others).</td>
                            </tr>   
                        @else
                            @if ($application->surcharges != null)
                            <tr>
                                <td>Surcharges</td>
                                <td>₱{{ number_format($application->surcharges, 2) }}</td>
                                <td>
                                    <form action="{{ route('technical.deleteSurcharges', $application->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif

                            @if ($application->late_confirmation != null)
                            <tr>
                                <td>Late Confirmation</td>
                                <td>₱{{ number_format($application->late_confirmation, 2) }}</td>
                                <td>
                                    <form action="{{ route('technical.deleteLateConfirmation', $application->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif

                            @if ($application->penalties != null)
                            <tr>
                                <td>Penalties</td>
                                <td>₱{{ number_format($application->penalties, 2) }}</td>
                                <td>
                                    <form action="{{ route('technical.deletePenalties', $application->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif

                            @if ($application->others != null)
                            <tr>
                                <td>Others</td>
                                <td>₱{{ number_format($application->others, 2) }}</td>
                                <td>
                                    <form action="{{ route('technical.deleteOthers', $application->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endif

                        <tr>
                            <td class="fw-bold">Total</td>
                            <td>₱{{ number_format($total_fees, 2) }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

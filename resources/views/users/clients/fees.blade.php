@extends('layouts.app')

@section('title', 'Show Fees')

@section('content')
<div class="row gx-0">
    <!-- Sidebar -->
    <div class="card col-2 card-background h-100 shadow-lg rounded">
        <ul class="list-group sidebar-list fs-5">
            <a href="{{ route('client.create') }}" class="text-decoration-none">
                <li class="list-item fw-bold p-3 hover:bg-primary rounded text-white">
                    <i class="fa-solid fa-file-circle-plus"></i> File Application
                </li>
            </a>
            <a href="{{ route('client.show') }}" class="text-decoration-none">
                <li class="list-item fw-bold p-3 hover:bg-primary rounded text-white">
                    <i class="fa-regular fa-folder-open"></i> View Applications
                </li>
            </a>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="col-10 w-50 mx-auto">
        <div class="row mt-5">
            <div class="col bg-white shadow rounded p-4">
                <h1 class="h4">Full Name: <strong>{{ $application->user->first_name }} {{ $application->user->last_name }}</strong></h1>
                <hr>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Penalties / Fees</th>
                                <th scope="col" class="text-end">Amount (₱)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($application->applicationFees as $application_fee)
                                <tr>
                                    <td>{{ $application_fee->fee->name }}</td>
                                    <td class="text-end">₱ {{ number_format($application_fee->fee->amount, 2) }}</td>
                                </tr>
                            @endforeach
                            @if ($application->surcharges != 0)
                                <tr>
                                    <td>Surcharges</td>
                                    <td class="text-end">₱ {{ number_format($application->surcharges, 2) }}</td>
                                </tr>
                            @endif
                            @if ($application->late_confirmation != 0)
                                <tr>
                                    <td>Late Confirmation</td>
                                    <td class="text-end">₱ {{ number_format($application->late_confirmation, 2) }}</td>
                                </tr>
                            @endif
                            @if ($application->penalties != 0)
                                <tr>
                                    <td>Penalties</td>
                                    <td class="text-end">₱ {{ number_format($application->penalties, 2) }}</td>
                                </tr>
                            @endif
                            @if ($application->others != 0)
                                <tr>
                                    <td>Others</td>
                                    <td class="text-end">₱ {{ number_format($application->others, 2) }}</td>
                                </tr>
                            @endif
                            <tr class="table-primary fw-bold">
                                <td>Total</td>
                                <td class="text-end">₱ {{ number_format($total, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pay Fees Button -->
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#qrCodeModal">
                        Pay Fees
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- QR Code Modal -->
<div class="modal fade" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrCodeModalLabel">Scan to Pay Fees</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('icons/qr.jpg') }}" alt="QR Code" class="img-fluid">
                <p class="mt-3">Scan this QR code to pay your fees.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Technical')

@section('content')
<div class="row gx-0">
<div class="col-12">
    <h1 class="text-center my-4" style="color: white; font-weight: bold;">View All Applications</h1>
</div>

    <div class="card col-2 card-background h-100 shadow-lg rounded">
        <ul class="list-group sidebar-list fs-5">
            <a href="{{ route('dashboard.index') }}" class="text-decoration-none">
                <li class="list-item fw-bold p-3 hover:bg-primary rounded">
                    <i class="fa-solid fa-tachometer-alt"></i> Dashboard
                </li>
            </a>
            <a href="{{ route('technical.show') }}" class="text-decoration-none">
                <li class="list-item fw-bold p-3 hover:bg-primary rounded">
                    <i class="fa-solid fa-box-open"></i> View Applications
                </li>
            </a>
            <a href="{{ route('client.show') }}" class="text-decoration-none">
                <li class="list-item fw-bold p-3 hover:bg-primary rounded">
                    <i class="fa-solid fa-chart-pie"></i> Reports
                </li>
            </a>
        </ul>
    </div>

    <div class="col-10">
        <div class="table-responsive">
            <table class="table table-hover text-center mx-auto">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID No.</th>
                        <th>Full Name</th>
                        <th>Application No.</th>
                        <th>Application Type</th>
                        <th>Denomination</th>
                        <th>Chassis No.</th>
                        <th>Motor No.</th>
                        <th>Plate No.</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Fees</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($all_applications as $app)
                    <tr>
                        <td>{{ $app->id }}</td>
                        <td>{{ $app->user->first_name }} {{ $app->user->last_name }}</td>
                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#app-{{ $app->id }}" class="btn btn-link text-primary">
                                {{ $app->app_number }}
                            </button>
                        </td>
                        <td>{{ $app->type->name }}</td>
                        <td>{{ $app->deno->name }}</td>
                        <td>{{ $app->chassis_number }}</td>
                        <td>{{ $app->motor_number }}</td>
                        <td>{{ $app->plate_number }}</td>
                        <form action="{{ route('technical.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="application_id" value="{{ $app->id }}">
                            <td class="align-middle">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="status[{{ $app->id }}]" id="verified-{{ $app->id }}" value="1" class="form-check-input" {{ $app->status == 1 ? 'checked' : '' }}>
                                    <label for="verified-{{ $app->id }}" class="form-check-label text-success fst-italic">Verified</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="status[{{ $app->id }}]" id="pending-{{ $app->id }}" value="2" class="form-check-input" {{ $app->status == 2 ? 'checked' : '' }}>
                                    <label for="pending-{{ $app->id }}" class="form-check-label text-warning fst-italic">Pending</label>
                                </div>
                                @error('status[{{ $app->id }}]')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <textarea name="remarks[{{ $app->id }}]" id="remarks" cols="3" rows="3" class="form-control">{{ $app->remarks }}</textarea>
                                @error('remarks[{{ $app->id }}]')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <a href="{{ route('technical.fees', $app->id) }}" class="btn btn-outline-primary btn-sm">Add Fees</a>
                                <a href="{{ route('technical.showfees', $app->id) }}" class="btn btn-outline-primary btn-sm">Show Fees</a>
                            </td>
                            <td>{{ $app->remarks }}</td>
                        </form>
                    </tr>
                    @include('users.technical.modals.modal')
                    @empty
                    <tr>
                        <td colspan="12" class="text-center">
                            <p class="text-muted fst-italic fs-2">No results found.</p>
                        </td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="11"></td>
                        <td class="text-center">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    /* Remove borders of the table */
    .table, .table th, .table td {
        border: none !important;
    }

    /* Center all text inside the table */
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        horizontal-align: middle;
    }

    /* Style the table to center it on the page */
    .table-responsive {
        margin: 0 auto;
    }

    /* Global font style */
    body, .table, .sidebar-list, .form-check-label, .btn, .modal-body, .modal-header, .modal-footer {
        font-family: 'Arial', 'sans-serif';
    }

    /* Styling for the modal */
    .modal-body {
        color: black !important;
    }
    .modal-header, .modal-footer {
        color: black !important;
    }

    /* Style the form checkboxes */
    .form-check-inline {
        margin-right: 10px;
    }

    /* Style the buttons for Fees and Actions */
    .btn-outline-primary {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    /* Add some spacing to the table rows for better readability */
    .table tr td {
        padding: 15px;
    }

    /* Add some spacing for the Submit button */
    .btn-danger {
        padding: 10px 20px;
    }

    /* Hover effect on sidebar links */
    .sidebar-list .list-item:hover {
        background-color: #007bff;
        color: white;
    }

    /* Improved design for sidebar */
    .sidebar-list {
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .list-item {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Style for the header of the sidebar */
    .sidebar-list .list-item {
        padding: 12px 15px;
    }
</style>
@endsection

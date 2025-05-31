@extends('layouts.app')

@section('title', 'Admin: Users')

@section('content')
<!-- Sidebar -->
<div class="row gx-0 justify-content-center">
    <div class="card col-2 card-background h-100 shadow-lg rounded">
        <ul class="list-group sidebar-list fs-5">
            <a href="{{ route('admin.users') }}" class="text-decoration-none">
                <li class="list-item fw-bold p-3 hover:bg-primary rounded text-white">
                    <i class="fa-solid fa-users-cog"></i> Manage Users
                </li>
            </a>
            <a href="{{ route('admin.denominations') }}" class="text-decoration-none">
                <li class="list-item fw-bold p-3 hover:bg-primary rounded text-white">
                    <i class="fa-solid fa-cogs"></i> Manage Denominations
                </li>
            </a>
            <a href="#" class="text-decoration-none">
                <li class="list-item fw-bold p-3 hover:bg-primary rounded text-white">
                    <i class="fa-regular fa-envelope"></i> Manage Application Type
                </li>
            </a>
            <a href="{{ route('admin.report') }}" class="text-decoration-none">
                <li class="list-item fw-bold p-3 hover:bg-primary rounded text-white">
                    <i class="fa-solid fa-cogs"></i> Reports
                </li>
            </a>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="col-10 mt-4"> <!-- Added margin-top for spacing between navbar and table -->
        
        <div class="table-responsive">
            <table class="table table-hover align-middle ms-1">
                <thead>

                <tr>
            <th colspan="6" class="text-center text-white fs-1 fw-bold">Manage Users</th> <!-- Header row for Manage Users -->
        </tr>
                    <tr>
                        <th></th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Date Registered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_users as $user)
                    <tr>
                        <td>
                            @if ($user->avatar)
                                <img src="{{ $user->avatar }}" alt="{{ $user->first_name }} {{ $user->last_name }}" class="img-thumbnail rounded-circle" style="height: 40px; width: 40px;">
                            @else
                                <i class="fas fa-circle-user text-dark icon-sm"></i>
                            @endif
                        </td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role_id === $admin)
                                <span class="badge bg-danger">Admin</span>
                            @elseif($user->role_id === $tech)
                                <span class="badge bg-info">Technical</span>
                            @elseif($user->role_id === $record)
                                <span class="badge bg-warning">Record</span>
                            @elseif($user->role_id === $client)
                                <span class="badge bg-success">Client</span>
                            @else
                                <span class="badge bg-secondary">Staff</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('F d, Y') }}</td>
                        <td>
                            @if (Auth::user()->id !== $user->id)
                                <!-- Edit button -->
                                <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit-user-{{ $user->id }}" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <!-- Delete button -->
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-user-{{ $user->id }}" title="Delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                    @include('admin.users.modals.action')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<!-- Add Custom Styles -->
@section('styles')
<style>
    /* Custom Sidebar Design */
    .admin-dashboard-list {
        background-color: #343a40;
        padding-top: 30px;
        height: 100vh;
        color: white;
        box-shadow: 2px 0px 5px rgba(0,0,0,0.2);
    }

    .admin-list .list-group-item {
        border-radius: 10px;
        padding: 12px 20px;
        transition: background-color 0.3s ease;
    }

    .admin-list .list-group-item:hover {
        background-color: #0056b3;
    }

    /* Table Design */
    .table th, .table td {
        vertical-align: middle;
        padding: 15px;
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Badge for Roles */
    .badge {
        font-size: 0.9rem;
        padding: 5px 10px;
    }

    /* Add margins and responsiveness */
    @media (max-width: 768px) {
        .admin-dashboard-list {
            display: none;
        }

        .col-10 {
            width: 100%;
        }
    }

    /* Header Style */
    h2.text-white {
        color: white; /* Ensure the Manage Users header is white */
    }

    /* Space and Styling for Table */
    .table-responsive {
        margin-top: 20px; /* Ensure proper space from the header */
    }
</style>
@endsection

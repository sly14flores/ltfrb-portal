@extends('layouts.app')

@section('title', 'Client')

@section('content')

<div class="row gx-0">
    <!-- Sidebar -->
    <div class="card col-2 card-background h-100 shadow-lg rounded">
        <ul class="list-group sidebar-list fs-5">
            @if (Auth::user()->role_id === $client)
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
            @elseif (Auth::user()->role_id === $tech)
                <a href="{{ route('dashboard.index') }}" class="text-decoration-none">
                    <li class="list-item fw-bold p-3 hover:bg-primary rounded text-white">
                        <i class="fa-solid fa-tachometer-alt"></i> Dashboard
                    </li>
                </a>
                <a href="{{ route('technical.show') }}" class="text-decoration-none">
                    <li class="list-item fw-bold p-3 hover:bg-primary rounded text-white">
                        <i class="fa-solid fa-box-open"></i> View Applications
                    </li>
                </a>
                <a href="{{ route('client.show') }}" class="text-decoration-none">
                    <li class="list-item fw-bold p-3 hover:bg-primary rounded text-white">
                        <i class="fa-solid fa-chart-pie"></i> Reports
                    </li>
                </a>
            @elseif (Auth::user()->role_id === $admin)
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
            @endif
        </ul>
    </div>

    <!-- Dynamic Content Area -->
    <div class="col-10">
        <div class="row gx-0 justify-content-start mt-3 ms-2">
            @if (Auth::user()->role_id === $client)
                <div class="col-md-6 col-xl-4">
                    <div class="card p-5 m-2 card-background h-100 shadow-lg rounded">
                        <i class="fa-solid fa-file-upload d-block fs-1 text-primary text-center"></i>
                        <h3 class="text-center h4 mb-3">
                            <i class="fa-solid fa-file-circle-plus me-2"></i> File Application
                        </h3>
                        <p class="text-dark text-center">Submit your application details. Upload required files and submit.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card p-5 m-2 card-background h-100 shadow-lg rounded">
                        <i class="fa-solid fa-clipboard-list d-block fs-1 text-primary text-center"></i>
                        <h3 class="text-center h4 mb-3">
                            <i class="fa-solid fa-clipboard-list me-2"></i> All Applications ({{ $user->applications->count() }})
                        </h3>
                        <p class="text-dark text-center">View all your previous applications and their status.</p>
                    </div>
                </div>
            @elseif (Auth::user()->role_id === $tech)
                <div class="col-md-4 col-xl-4">
                    <div class="card p-5 m-2 card-background h-100 shadow-lg rounded">
                        <h3 class="text-center h4 mb-3">
                            <i class="fa-solid fa-users me-2"></i> All Applications ({{ $applications->count() }})
                        </h3>
                        <p class="text-dark text-center">Review and process all submitted applications from clients.</p>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="card p-5 m-2 card-background h-100 shadow-lg rounded">
                        <h3 class="text-center h4 mb-3">
                            <i class="fa-solid fa-hourglass-half me-2"></i> Pending Application
                        </h3>
                        <p class="text-dark text-center">Check the applications that are awaiting review or action.</p>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="card p-5 m-2 card-background h-100 shadow-lg rounded">
                        <h3 class="text-center h4 mb-3">
                            <i class="fa-solid fa-check-circle me-2"></i> Approved Application
                        </h3>
                        <p class="text-dark text-center">View and manage applications that have been approved.</p>
                    </div>
                </div>
            @elseif (Auth::user()->role_id === $admin)
                <div class="col-md-4 col-xl-3">
                    <div class="card p-5 m-2 card-background h-100 shadow-lg rounded">
                        <i class="fa-solid fa-users d-block fs-1 text-primary text-center"></i>
                        <h3 class="text-center h4 mb-3">All Users ({{ $all_users->count() }})</h3>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card p-5 m-2 card-background h-100 shadow-lg rounded">
                        <i class="fa-solid fa-boxes d-block fs-1 text-primary text-center"></i>
                        <h3 class="text-center h4 mb-3">Denominations</h3>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card p-5 m-2 card-background h-100 shadow-lg rounded">
                        <i class="fa-regular fa-folder d-block fs-1 text-primary text-center"></i>
                        <h3 class="text-center h4 mb-3">Application Types</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

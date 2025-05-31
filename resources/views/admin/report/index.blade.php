

<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #printable-area, #printable-area * {
            visibility: visible;
        }

        #printable-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .no-print {
            display: none !important;
        }
    }
</style>
@extends('layouts.app')

@section('title', 'Reports')

@section('content')
<div class="mt-3"> <!-- Added spacing wrapper -->

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

    <div class="col-10 mx-auto">
        <div class="row">
            <div class="col">
                <!-- Printable Area -->
                <div id="printable-area" class="bg-white p-4 border rounded shadow-sm  m-2">
                    <div class="d-flex justify-content-between align-items-center mb-1 no-print">
                        <h2 class="mb-3">REPORT</h2>
                        <div class="d-flex gap-1 align-items-center ">
                            <!-- Dropdown Filter -->
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filter
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                    <li><a class="dropdown-item" href="{{ route('admin.report.show', ['filter' => 'all']) }}">All</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.report.show', ['filter' => 'weekly']) }}">Weekly</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.report.show', ['filter' => 'monthly']) }}">Monthly</a></li>
                                </ul>
                            </div>
                            <!-- Print Button -->
                            <button onclick="printDiv('printable-area')" class="btn btn-primary me-md-2">
                                <i class="bi bi-printer "></i> Print Report
                            </button>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Application ID</th>
                                <th>Application Type</th>
                                <th>Client Name</th>
                                <th>Status</th>
                                <th>Date Filed</th>
                                <!-- Add more headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($userApp as $item)
                                <tr>
                                    <td>{{ $item->app_number }}</td>
                                    <td>Dropping</td>
                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                    <td>
                                        @if ($item->status === 1)
                                        <span class="badge bg-success">Completed</span>
                                        @elseif ($item->status === 2)
                                            <span class="badge bg-info">Pending</span>
                                        @elseif ($item->status === 3)
                                            <span class="badge bg-warning">In Transit to Cental Office</span>
                                        @elseif ($item->status === 4)
                                            <span class="badge bg-danger">Returned</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y') }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="text-center">No data available</td></tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div> <!-- End spacing wrapper -->
<script>
    function printDiv(divId) {
        window.print();
    }
</script>
@endsection

@extends('layouts.app')

@section('title', 'View Application')

@section('content')
<div class="mt-3"> <!-- Added spacing wrapper -->

<div class="row gx-0">
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

    <div class="col-10">
        <div class="row mt-4 mb-4">
            <div class="col">
                <h1 class="text-white text-center">View Application</h1>
            </div>
        </div>

        <table class="table table-striped w-75 mx-auto">
            <thead>
                <tr>
                    <th>ID No.</th>
                    <th>Application No.</th>
                    <th>Fees</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Requirements</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user->applications as $app)
                <tr>
                    <td>{{ $app->id }}</td>
                    <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#app-{{ $app->id }}" class="btn bg-transparent text-primary">
                            {{ $app->app_number }}
                        </button>
                    </td>
                    <td>
                        <a href="{{ route('client.showFees', $app->id) }}" class="text-decoration-none">
                            Show Fees
                        </a>
                    </td>
                    <td>
                        @if ($app->status == 1)
                            <span class="form-span text-success fst-italic">Verified</span>
                        @else
                            <span class="form-span text-warning fst-italic">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if ($app->remarks)
                            {{ $app->remarks }}        
                        @else
                            <span class="text-muted fst-italic">No remarks</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" data-bs-target="#requirements-{{ $app->id }}" data-bs-toggle="modal" class="btn btn-sm bg-transparent text-primary">Requirements</button>
                    </td>
                </tr>
                @include('users.clients.modals.modal')
                @empty
                <tr>
                    <td colspan="10" class="text-center">
                        <p class="text-muted fst-italic fs-2">No results found.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</div> <!-- End spacing wrapper -->
@endsection

@extends('layouts.app')

@section('title', 'Denominations')

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
        <div class="row mb-4 mt-3">
            <div class="col">
                <form action="{{ route('admin.denominations.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col ms-3">
                            <input type="text" name="name" class="form-control" placeholder="Add a denomination..." autofocus>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</button>
                        </div>
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
        </div>

        <div class="row w-100 mx-auto">
            <div class="col-7">
                <table class="table table-hover align-middle bg-white border table-sm text-center">
                    <thead>
                        <th>#</th>
                        <th>NAME</th>
                        <th>COUNT</th>
                        <th>LAST UPDATED</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse ($all_denominations as $denomination)
                            <tr>
                                <td>{{ $denomination->id }}</td>
                                <td>{{ $denomination->name }}</td>
                                <td>{{ $denomination->updated_at }}</td>
                                <td>
                                    {{-- Edit button --}}
                                    <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit-denomination-{{ $denomination->id }}" title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    {{-- Delete button --}}
                                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-denomination-{{ $denomination->id }}" title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                            {{-- Include modal here --}}
                            @include('admin.denominations.modals.action')
                        @empty
                            <tr>
                                <td colspan="5" class="lead text-muted text-center">No denominations found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div> <!-- End spacing wrapper -->

@endsection

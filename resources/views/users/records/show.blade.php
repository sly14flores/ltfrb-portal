@extends('layouts.app')

@section('title', 'Records')

@section('content')
<div class="row gx-0">
    <div class="col-2 admin-dashboard-list mh-100">
        <ul class="admin-list fs-5 list-group">
            <a href="{{ route('dashboard.index') }}" class="text-decoration-none text-white mb-1">
                <li class="fw-bold">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </li>
            </a>
            <a href="{{ route('technical.show') }}" class="text-decoration-none text-white mb-1">
                <li class="fw-bold">
                    <i class="fa-solid fa-chart-line"></i> View Applications
                </li>
            </a>
            <a href="#" class="text-decoration-none text-white">
                <li class=" fw-bold text-white">
                    <i class="fa-regular fa-envelope"></i> Reports
                </li>
            </a>
        </ul>
    </div> 

    <div class="col-10">
        
        <table class="table table-striped">
            <thead>
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
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($all_applications as $app)
                <tr>
                    <td>{{ $app->id }}</td>
                    <td>{{ $app->user->first_name }} {{ $app->user->last_name }}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            {{ $app->app_number }}
                        </a>
                    </td>
                    <td>{{ $app->type->name }}</td>
                    {{-- <td></td> --}}
                    <td>{{ $app->deno->name }}</td>
                    <td>{{ $app->chassis_number }}</td>
                    <td>{{ $app->motor_number }}</td>
                    <td>{{ $app->plate_number }}</td>
                    {{-- add a requirement table --}}
                    <form action="{{ route('technical.update') }}" method="post">
                        @csrf
                    <input type="hidden" name="application_id" value="{{ $app->id }}">
                    <td>
                            {{-- create a condition that will disable if the user is not technical --}}
                        <input type="radio" name="status[{{ $app->id }}]" id="verified-{{ $app->id }}" value="1" class="form-check-input" {{ $app->status == 1 ? 'checked' : '' }}>
                        <label for="{{ $app->id }}" class="form-label text-success fst-italic">Verified</label>
                        <br>
                        <input type="radio" name="status[{{ $app->id }}]" id="pending-{{ $app->id }}" value="2" class="form-check-input" {{ $app->status == 2 ? 'checked' : '' }}>
                        <label for="{{ $app->id }}" class="form-label text-warning fst-italic">Pending</label>
                        @error('status[{{ $app->id }}]')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                
                    </td>
                    <td>
                        <textarea name="remarks[{{ $app->id }}]" id="remarks" cols="3" rows="3" class="form-control"></textarea>
                        @error('remarks[{{ $app->id }}]')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        {{ $app->remarks }}
                    </td>
                </tr>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <p class="text-muted fst-italic fs-2">No results found.</p>
                    </td>
                </tr>
                @endforelse
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="align-middle">
                        <button type="submit" class="btn bg-transparent text-danger" class="d-inline">Submit</button>
                    </td>
                </form>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
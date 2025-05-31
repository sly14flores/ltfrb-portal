@extends('layouts.app')

@section('title', 'File Application')

@section('content')
<div class="mt-3"> <!-- Added top margin to create space below navbar -->
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
        <div class="col-10">
            <main class="w-75 m-auto p-4 bg-white border rounded shadow-sm">
                <form action="{{ route('application.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="h3 mb-3 fw-bold" style="font-family: Helvetica, Arial, sans-serif;">File Application</h1>

                    <!-- Application Type -->
                    <div class="mb-3">
                        <label for="app-type" class="form-label fw-semibold">Application Type</label>
                        <select name="app_type" id="app-type" class="form-select form-select-lg">
                            <option value="" hidden>Select Application Type</option>
                            @foreach ($all_types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('app_type')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Denomination -->
                    <div class="mb-3">
                        <label for="denomination" class="form-label fw-semibold">Denomination</label>
                        <select name="denomination" id="denomination" class="form-select form-select-lg">
                            <option value="" hidden>Select Denomination</option>
                            @foreach ($all_denominations as $denomination)
                                <option value="{{ $denomination->id }}">{{ $denomination->name }}</option>
                            @endforeach
                        </select>
                        @error('denomination')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Case & Motor Number -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6 form-floating">
                            <input type="text" name="case_no" id="case-no" placeholder="Case No." class="form-control form-control-lg">
                            <label for="case-no">Case No.</label>
                            @error('case_no')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" name="motor_no" id="motor-no" placeholder="Motor No." class="form-control form-control-lg">
                            <label for="motor-no">Motor No.</label>
                            @error('motor_no')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Chassis & Plate Number -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6 form-floating">
                            <input type="text" name="chassis_no" id="chassis-no" placeholder="Chassis No." class="form-control form-control-lg">
                            <label for="chassis-no">Chassis Number</label>
                            @error('chassis_no')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" name="plate_number" id="plate-number" placeholder="Plate Number" class="form-control form-control-lg">
                            <label for="plate-number">Plate Number</label>
                            @error('plate_number')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="text-center mt-4">
                        <button class="btn btn-primary btn-lg me-2" type="submit">{{ __('Submit') }}</button>
                        <button class="btn btn-outline-secondary btn-lg" type="submit">{{ __('Clear') }}</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</div> <!-- Close mt-3 wrapper -->
@endsection

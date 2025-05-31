@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="row justify-content-center align-items-center">
        <!-- Left Column: Login Form (80%) -->
        <div class="col-md-8 col-lg-6">
            <main class="form-signin w-100 m-auto border rounded shadow-lg p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center mb-4">
                        <img src="{{ asset('icons/ltfrb_seal.png') }}" alt="LTFRB SEAL" width="80" height="80">
                        <h1 class="h3 mb-3 fw-bold" style="font-family:helvetica; color: black;">Welcome Back!</h1>
                    </div>

                    <!-- Email Input Field -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="email" style="color: black;">Email Address</label>
                    </div>
                    @error('email')
                        <div class="text-danger small mb-2">{{ $message }}</div>
                    @enderror

                    <!-- Password Input Field -->
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password" style="color: black;">Password</label>
                    </div>
                    @error('password')
                        <div class="text-danger small mb-2">{{ $message }}</div>
                    @enderror

                    <!-- Login Button -->
                    <button class="btn btn-primary w-100 py-2 mb-3" type="submit">{{ __('Login') }}</button>

                    <!-- Register Button -->
                    <div class="text-center">
                        <button class="btn btn-outline-secondary w-100 py-2" type="button">
                            <a class="nav-link text-decoration-none" href="{{ route('register') }}" style="color: black;">{{ __('Create an Account') }}</a>
                        </button>
                    </div>
                </form>
            </main>
        </div>

        <!-- Divider Between Left and Right Columns -->
        <div class="col-1 d-none d-lg-block">
            <div class="divider" style="border-left: 2px solid #ddd; height: 100%;"></div>
        </div>

        <!-- Right Column: Information (20%) -->
        <div class="col-md-4 col-lg-5">
            <div class="info-section p-4 border rounded shadow-lg text-center text-white" style="color: white;">
                <p style="color: white;">Apply for a franchise online and manage your LTFRB-related applications with ease. Stay updated with the latest news, announcements, and developments in the transportation industry.</p>
                <p style="color: white;">For assistance, please contact our support team or visit our help section.</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<footer class="bg-transparent text-white text-center py-2 mt-1">
    <div class="container">
        <p>&copy; {{ date('Y') }} LTFRB. All rights reserved.</p>
        <div>
            <a href="https://yourwebsite.com" class="text-white text-decoration-none me-3">Home</a>
            <a href="https://yourwebsite.com/contact" class="text-white text-decoration-none me-3">Contact</a>
            <a href="https://yourwebsite.com/privacy" class="text-white text-decoration-none">Privacy Policy</a>
        </div>
        <div class="mt-3">
            <p>Powered by <a href="https://yourwebsite.com" class="text-white text-decoration-none">Your Website</a></p>
        </div>
    </div>
</footer>


@endsection

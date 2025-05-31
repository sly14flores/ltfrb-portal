@extends('layouts.app')

@section('content')
    <main class="form-signin w-100 m-auto border rounded text-center">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <img src="{{ asset('icons/ltfrb_seal.png') }}" alt="LTFRB SEAL" width="60" height="60">
            <h1 class="h2 mb-1 fw-normal" style="font-family:helvetica;">Create account</h1>

            <div class="input-group input-group-sm form-floating">
                <div class="form-floating mt-1">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first-name" id="first-name" name="first-name" placeholder="First Name">
                    <label for="first-name">First Name</label>
                
                </div>
                <div class="form-floating mt-1">
                    <input id="last-name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last-name" placeholder="Last Name">
                    <label for="last-name">Last Name</label>
                </div>
            </div>
            <div class="form-floating mt-1">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="mail@mail.com" required autocomplete="email">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mt-1">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                <label for="password">Password</label>
            </div>
            <div class="form-floating mt-1">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                <label for="password-confirm">Confirm Password</label>
            </div>
            <button class="btn btn-primary w-100 " type="submit">{{ __('Register') }}</button>
            <p class=""> 
                Already have an account? 
                <a href="{{ route('login') }}">{{ __('Sign in') }}</a> 
            </p>
        </form>
    </main>
@endsection

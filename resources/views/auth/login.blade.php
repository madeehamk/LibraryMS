@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6 col-lg-5">

        <div class="card shadow-sm">

            <div class="card-header bg-dark text-white text-center">
                <h4 class="mb-0">Login</h4>
            </div>

            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}">

                        @error('email')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control">

                        @error('password')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div class="form-check mb-3">

                        <input
                            type="checkbox"
                            name="remember"
                            class="form-check-input"
                            id="remember">

                        <label
                            class="form-check-label"
                            for="remember">
                            Remember me
                        </label>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-dark w-100">
                        Login
                    </button>

                </form>


                <div class="text-center mt-3">

                    <span>Don't have an account?</span>

                    <a href="{{ route('showRegister') }}">
                        Register
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
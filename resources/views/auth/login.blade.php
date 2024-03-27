@extends('layouts.app')

@push('script-bottom')
    <script>
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const btnLogin = document.getElementById('submit');

        email.addEventListener('input', () => {
            if (email.value && password.value) {
                btnLogin.classList.remove('bg-[#B8B4B1]');
                btnLogin.classList.add('bg-[#E59B0C]');
            } else {
                btnLogin.classList.remove('bg-[#E59B0C]');
                btnLogin.classList.add('bg-[#B8B4B1]');
            }
        });

        password.addEventListener('input', () => {
            if (email.value && password.value) {
                btnLogin.classList.remove('bg-[#B8B4B1]');
                btnLogin.classList.add('bg-[#E59B0C]');
            } else {
                btnLogin.classList.remove('bg-[#E59B0C]');
                btnLogin.classList.add('bg-[#B8B4B1]');
            }
        });
    </script>
@endpush

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="flex h-screen">
        <div class="h-screen w-1/2 flex flex-col items-center justify-center gap-14">
            <h1 class="font-bold text-3xl items-center flex flex-col justify-center text-center">Halo! Selamat Datang
                di<br />
                E-Study</h1>
            <img src="{{ asset('assets/image/login.png') }}" alt="" class="w-[500px]" />
        </div>
        <div class=" flex-col flex items-center justify-center w-1/2 bg-[#215784] min-h-screen gap-4">
            <h1 class="text-white flex w-full justify-center font-bold text-xl">Login</h1>
            <div class="flex justify-center w-full items-center">
                <form class="bg-white w-3/5  shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 min-h-[400px]" method="POST"
                    action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4 mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 " for="email">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border w-full py-3 px-5 text-gray-700 rounded-3xl leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="text" placeholder="email" name="email" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input
                            class="shadow appearance-none border w-full py-3 px-5 flex items-center justify-center text-gray-700 rounded-3xl leading-tight focus:outline-none focus:shadow-outline"
                            id="password" type="password" placeholder="******************" name="password" required
                            autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <a class="align-baseline font-bold text-sm text-[#215784] hover:text-blue-800 flex justify-end w-full"
                        href="#">
                        Lupa kata sandi ?
                    </a>
                    <div class="flex items-center justify-between my-5">
                        <button
                            class="bg-[#B8B4B1] hover:bg-gray-400 w-full text-white font-bold py-2 px-4 rounded-3xl focus:outline-none focus:shadow-outline"
                            type="submit" id="submit">
                            Sign In
                        </button>
                    </div>
                    <div>
                        Belum punya akun ? <a href="{{ route('register') }}" class="text-[#215784] font-bold">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

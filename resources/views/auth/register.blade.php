@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- pembatas --}}
    <div class="flex h-screen">
        <div class="h-screen w-1/2 flex flex-col items-center justify-center gap-14">
            <h1 class="font-bold text-3xl items-center flex flex-col justify-center text-center">Halo! Selamat Datang
                di<br />
                E-Study</h1>
            <img src="{{ asset('assets/image/login.png') }}" alt="" class="w-[500px]" />
        </div>
        <div class=" flex-col flex items-center justify-center w-1/2 bg-[#215784] min-h-screen gap-4">
            <h1 class="text-white flex w-full justify-center font-bold text-xl">Registrasi</h1>
            @error('email')
                <span class="text-red-500">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('password')
                <span class="text-red-500">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('name')
                <span class="text-red-500">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="flex justify-center w-full items-center">
                <form class="bg-white w-3/5  shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 min-h-[450px]" method="POST"
                    action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4 mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Full Name
                        </label>
                        <input
                            class="shadow appearance-none border w-full py-2 px-5 text-gray-700 rounded-3xl leading-tight focus:outline-none focus:shadow-outline"
                            id="fullname" type="text" placeholder="nama lengkap" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="mb-4 mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 " for="username">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border w-full py-2 px-5 text-gray-700 rounded-3xl leading-tight focus:outline-none focus:shadow-outline"
                            name="email" placeholder="email" id="email" type="email" value="{{ old('email') }}"
                            required autocomplete="email">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input
                            class="shadow appearance-none border w-full py-2 px-5 flex items-center justify-center text-gray-700 rounded-3xl leading-tight focus:outline-none focus:shadow-outline"
                            id="password" type="password" placeholder="******************" name="password" required
                            autocomplete="new-password">
                    </div>

                    {{-- confirm password --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Confirm Password
                        </label>
                        <input
                            class="shadow appearance-none border w-full py-2 px-5 flex items-center justify-center text-gray-700 rounded-3xl leading-tight focus:outline-none focus:shadow-outline"
                            type="password" placeholder="******************" required id="password-confirm"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="flex items-center justify-between mb-5 mt-14">
                        <button
                            class="bg-red-400 hover:bg-gray-400 w-full text-white font-bold py-2 px-4 rounded-3xl focus:outline-none focus:shadow-outline"
                            type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div>
                        Sudah punya akun ? <a href="{{ route('login') }}" class="text-[#215784] font-bold">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

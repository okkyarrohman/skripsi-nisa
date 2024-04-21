@extends('layouts.app')

@section('content')
    <div class="mt-10 mx-28">
        <div class="ml-3">

            @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"> {{ session('error') }}</span>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline"> {{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="">
                    <p class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert""><strong>Opps Something went wrong</strong></p>
                    <ul class="list-disc ">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('absen.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="flex items-center gap-5 mt-6">
                    <label for="nama" class=" font-semibold">Nama</label>
                    <input name="nama" type="text" placeholder="okky" class="border w-96 p-2 ml-14">
                </div>
                <div class="flex items-center gap-5 mt-6">
                    <label for="absen" class=" font-semibold">Nomor absen</label>
                    <input name="absen" type="text" placeholder="20012" class="border w-96 p-2">
                </div>
                <button class="flex justify-center bg-[#E59B0C] w-full mt-10 mb-4 py-2 rounded-2xl" type="submit">
                    <div class="flex items-center gap-4 text-white font-semibold">
                        Hadir
                    </div>
                </button>
            </form>
        </div>

    </div>
@endsection

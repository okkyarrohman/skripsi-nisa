@extends('layouts.app')

@section('content')
    <div class="mt-10 mx-28">
        <div class="ml-3">
            <form action="">
                <div class="flex items-center gap-5 mt-6">
                    <label for="nama" class=" font-semibold">Nama</label>
                    <input name="nama" type="text" placeholder="okky" class="border w-96 p-2 ml-14">
                </div>
                <div class="flex items-center gap-5 mt-6">
                    <label for="absen" class=" font-semibold">Nomor absen</label>
                    <input name="absen" type="text" placeholder="20012" class="border w-96 p-2">
                </div>
            </form>
        </div>
        <div class="flex justify-center bg-[#E59B0C] w-full mt-10 mb-4 py-2 rounded-2xl">
            <a href="TugasDipilih.html" class="flex items-center gap-4 text-white font-semibold">
                Hadir
            </a>
        </div>
    </div>
@endsection

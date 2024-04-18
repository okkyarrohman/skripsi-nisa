@extends('layouts.app')

@if (!empty($kelompok))
    @section('content')
        <div class="flex mx-10">
            <div class="mt-8 w-1/2 mb-20">
                <div class="mb-10">
                    <h1 class="text-xl font-bold">Selamat Datang Okky,</h1>
                    <p class="text-xl mb-4 font-bold">Selamat bergabung dalam JavaScript!</p>
                    <p class="">
                    <ol class="space-y-1 ml-5 list-decimal list-inside">
                        <li>Esther Howard</li>
                        <li>Cameron Williamson</li>
                        <li>Jenny Wilson</li>
                        <li>Jacob Jones</li>
                    </ol>
                    </p>
                </div>
                <div class="">
                    <h1 class="font-bold text-xl mb-4">Daftar Tugas</h1>
                    <div class="min-h-[300px]">
                        <details class="dropdown">
                            <summary class="m-1 border w-96 btn">
                                <div class="bg-blue-400 p-1 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                    </svg>
                                </div>
                                Dasar-dasar CSS
                                <div class="flex justify-end ml-44 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                </div>
                            </summary>
                            <ul class="p-2 menu dropdown-content z-[1] w-[86%] gap-7 ml-14">
                                <li class="border rounded-xl bg-base-100 shadow p-1">
                                    <a href="{{ route('tugas.show', ['tuga' => 1]) }}">Tugas 1
                                        <div class="flex justify-end w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li class="border rounded-xl bg-base-100 shadow p-1">
                                    <a href="{{ route('tugas.show', ['tuga' => 1]) }}">Tugas 2
                                        <div class="flex justify-end w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li class="border rounded-xl bg-base-100 shadow p-1">
                                    <a href="{{ route('tugas.show', ['tuga' => 1]) }}">Tugas 3
                                        <div class="flex justify-end w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center w-1/2 mx-10">
                <img src="./asset/tugas1.png" alt="">
            </div>
        </div>
    @endsection
@else
    @extends('murid.tugas.belum_kelompok')
@endif

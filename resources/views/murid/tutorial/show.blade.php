@extends('layouts.app')

@push('head-2')
    @include('includes.base_font_style')
@endpush

@section('content')
    <div class="flex mt-0 mx-10">
        <div class="mt-0 w-1/2 mb-20 ml-4">
            <div class="">
                <h1 class="font-bold text-xl mb-4">Daftar Tutorial</h1>
                <ul class="p-2 menu dropdown-content z-[1] w-[90%] gap-7">
                    @forelse ($tutorials as $item)
                        <li class="border rounded-xl shadow p-1">
                            <a class="" href="{{ route('tutorial.show', ['tutorial' => $item->id]) }}">
                                <div class="bg-[#ACC9E2] rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-[#055EA8]">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </div>
                                {{ $item->judul }}
                                <div class="flex justify-end w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li class="border rounded-xl shadow p-1">
                            <a class="" href="#">
                                <div class="bg-[#ACC9E2] rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-[#055EA8]">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </div>
                                Belum ada tutorial
                                <div class="flex justify-end w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </div>
                            </a>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="flex flex-col mt-10 w-1/2 space-y-5">
            <h1>{{ $tutorial->judul }}</h1>

            {!! $tutorial->deskripsi !!}

            @if ($tutorial->dokumen)
                <a href="{{ asset('storage/tutorial/dokumen/' . $tutorial->dokumen) }}" target="_blank"
                    class="rounded bg-kuning p-2">
                    Lihat Dokumen
                </a>
            @endif
        </div>
    </div>
@endsection

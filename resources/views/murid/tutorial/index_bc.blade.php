@extends('layouts.app')

@section('content')
    <div class="flex mt-0 mx-10">
        <div class="mt-0 w-1/2 mb-20 ml-4">
            <div class="">
                <h1 class="font-bold text-xl mb-4">Daftar Tutorial</h1>
                <div class="min-h-[300px]">
                    @forelse ($tutorials as $item)
                        <a href="{{ route('tutorial.show', ['tutorial'=>1]) }}" class="dropdown block">
                            <summary class="m-1 border btn flex justify-between px-5">
                                <div class="flex items-center gap-3">
                                    <div class="bg-blue-400 p-1 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                        </svg>
                                    </div>
                                    {{ $item->judul }}
                                </div>
                                <div class="flex justify-end items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                </div>
                            </summary>
                        </a>
                    @empty
                        <a href="#" class="dropdown">
                            <summary class="m-1 border btn flex justify-between px-5">
                                <div class="flex items-center gap-3">
                                    <div class="bg-blue-400 p-1 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                        </svg>
                                    </div>
                                    Belum Ada tutorial
                                </div>
                                <div class="flex justify-end items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                </div>
                            </summary>
                        </a>
                    @endforelse
                    {{-- <a href="#" class="dropdown">
                        <summary class="m-1 border btn flex justify-between px-5">
                            <div class="flex items-center gap-3">
                                <div class="bg-blue-400 p-1 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                    </svg>
                                </div>
                                Cara Rewrite URL Dengan HTACCESS
                            </div>
                            <div class="flex justify-end items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            </div>
                        </summary>
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center w-1/2">
            <img src="/asset/tutorial.png" alt="">
        </div>
    </div>
@endsection

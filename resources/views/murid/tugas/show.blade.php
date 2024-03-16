@extends('layouts.app')

@push('head')
    <style type="text/css" media="screen">
        #editor {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
@endpush

@push('script-bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.7/ace.js"
        integrity="sha512-oz/97HdPI510jvvYzVqE2tzz+jWpvUeVkK5OT0S2kPZOxuR+9cE8zT1V6UgwtRG71ThICBEtkPEzN5tfP/YeYw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode("ace/mode/c_cpp");
    </script>
@endpush

@section('content')
    <div class="flex mx-10">
        <div class="mt-8 w-1/2 mb-20">
            <div class="">
                <h1 class="font-bold text-xl mb-4">Daftar Tugas</h1>
                <div class="min-h-[300px]">
                    <details class="dropdown">
                        <summary class="m-1 border w-[500px] btn flex justify-between px-5">
                            <div class="flex items-center gap-3">
                                <div class="bg-blue-400 p-1 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                    </svg>
                                </div>
                                Dasar-dasar CSS
                            </div>
                            <div class="flex justify-end  items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            </div>
                        </summary>
                        <ul class="p-2 menu dropdown-content z-[1] w-[90%] gap-7 ml-12">
                            <li class="border rounded-xl bg-base-100 shadow p-1">
                                <a>Tugas 1
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
                                <a>Tugas 2
                                    <div class="flex justify-end w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </div>
                                </a>
                            </li>
                            <li class="border rounded-xl bg-[#ACC9E2] shadow p-1">
                                <a class="text-[#215784]">Tugas 3
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
        <div class="flex flex-col items-center mt-10 w-1/2 mx-10">
            <div class="border p-7">
                <p
                    class="border w-2/5 flex justify-center mb-8 items-center bg-[#F9D6D8] border-red-700 text-red-500 px-2 py-1">
                    Tenggat : 24 Oktober 2023</p>
                <div>
                    <div class="flex justify-between">
                        <h1 class="font-bold text-xl mb-4">Deskripsi Tugas</h1>
                        <div class="flex">0/<p class="text-[#215784] font-semibold">100</p>
                        </div>
                    </div>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="flex justify-end w-full mt-4">
                    <a href="{{ route('tugas.edit', ['tuga' => 1]) }}"
                        class="flex items-center gap-4 text-[#E59B0C] font-bold">Unggah Tugas
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="">
                <div class="flex items-center justify-center bg-[#708CD5] w-fit px-3 py-2 mt-6 rounded-lg gap-2">
                    <p class="text-white">
                        Coding.cs
                    </p>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>

                <div class="relative min-w-96 min-h-64">
                    <div id="editor">function foo(items) {
                        var x = "All this is syntax highlighted";
                        return x;
                        }</div>
                </div>
                <img src="./asset/filetugas1.png" alt="">
                <div class="flex items-center justify-center bg-[#708CD5] w-fit px-3 py-2 mt-6 rounded-lg gap-2">
                    <p class="text-white">
                        Output
                    </p>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>
                <img src="./asset/filetugas2.png" alt="">
            </div>
        </div>
    </div>
@endsection

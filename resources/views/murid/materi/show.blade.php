@extends('layouts.app')

@section('content')
    <div class="flex mt-0 mx-10">
        <div class="mt-0 w-1/2 mb-20 ml-4">
            <ul class="p-2 menu dropdown-content z-[1] w-[90%] gap-7">
                <li class="border bg-[#ACC9E2] rounded-xl shadow p-1">
                    <a class=" text-[#215784]" href="{{ route('materi.show', ['materi'=>1]) }}">
                        <div class="bg-[#215784] rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        Dasar-dasar CSS
                        <div class="flex justify-end w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 text-[#215784]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </a>
                </li>
                <li class="border rounded-xl bg-base-100 shadow p-1">
                    <a href="{{ route('materi.show', ['materi'=>1]) }}">
                        <div class="bg-[#ACC9E2] rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 text-[#055EA8]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        Dasar-dasar Python
                        <div class="flex justify-end w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </a>
                </li>
                <li class="border rounded-xl shadow p-1">
                    <a class="" href="{{ route('materi.show', ['materi'=>1]) }}">
                        <div class="bg-[#ACC9E2] rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 text-[#055EA8]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        Dasar-dasar HTML dan Java
                        <div class="flex justify-end w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </a>
                </li>
                <li class="border rounded-xl shadow p-1">
                    <a class="" href="{{ route('materi.show', ['materi'=>1]) }}">
                        <div class="bg-[#ACC9E2] rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 text-[#055EA8]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        Dasar-dasar Laravel
                        <div class="flex justify-end w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col w-1/2 my-6 mr-3">
            <div>
                <h1 class="font-bold text-2xl mb-5">Introduction to CSS</h1>
            </div>
            <div class="text-[#45484F]">
                <h3 class="font-semibold">Apa itu CSS?</h3>
                CSS (Cascade Style Sheet) adalah sebuah bahasa untuk mengatur tampilan web sehingga terlihat lebih
                menarik dan indah.<br />

                Dengan CSS, kita dapat mengatur layout (tata letak), warna, font, garis, background, animasi, dan
                lain-lain.<br />

                Contoh:
                Tanpa CSS, website Petani Kode terlihat jelek dan tidak tertata. Sedangkan jika menggunakan CSS,
                tampilannya jadi lebih bagus dan rapi.
                <br />
                <div class="flex items-center justify-center my-10">
                    <img src="{{ asset('assets/image/materiCSS.png') }}" alt="">
                </div>

                <p class="font-semibold mb-2">Sejarah dan Perkembangan CSS</p>

                Sebelum adanya CSS, tidak ada bahasa yang dipakai untuk memberikan style pada dokumen (web). Tampilan
                web terasa hambar dan kurang tertata.
                Ide awal tentang style sheet di browser bukan sesuatu yang baru. Pada tahun 1990, Tim Berners-Lee
                membuat web browser bernama NeXT browser/editor.
            </div>
        </div>
    </div>
@endsection

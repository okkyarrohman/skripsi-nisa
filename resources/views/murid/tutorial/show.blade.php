@extends('layouts.app')

@section('content')
    <div class="flex mt-0 mx-10">
        <div class="mt-0 w-1/2 mb-20 ml-4">
            <div class="">
                <h1 class="font-bold text-xl mb-4">Daftar Tugas</h1>
                <div class="min-h-[300px]">
                    <details class="dropdown">
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
                            <div class="flex justify-end  items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            </div>
                        </summary>
                        <ul class="p-2 menu dropdown-content z-[1] w-full gap-7">
                            <li class="border rounded-xl bg-base-100 shadow p-1 mt-4">
                                <a href="{{ route('tutorial.show', ['tutorial' => 1]) }}">
                                    <div class="bg-[#ACC9E2] rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-[#055EA8]">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                    </div>
                                    Cara Instalasi Linux
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
                                <a href="{{ route('tutorial.show', ['tutorial' => 1]) }}">
                                    <div class="bg-[#ACC9E2] rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-[#055EA8]">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                    </div>
                                    Cara Mengaktifkan Rewrite URL di Linux
                                    <div class="flex justify-end w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </div>
                                </a>
                            </li>
                            <li class="border bg-[#ACC9E2] rounded-xl shadow p-1">
                                <a class=" text-[#215784]" href="{{ route('tutorial.show', ['tutorial' => 1]) }}">
                                    <div class="bg-[#215784] rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                    </div>
                                    Cara Instalasi Database SQLite di Linux
                                    <div class="flex justify-end w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-[#215784]">
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
        <div class="flex flex-col w-1/2 my-6 mr-3">
            <div>
                <h1 class="font-bold text-2xl mb-5">Cara Instalasi Database SQLite di Linux</h1>
            </div>
            <div class="text-[#45484F]">
                <p>
                    SQLite adalah perangkat lunak basis data yang ringan. Sama seperti basis data lainnya yang merupakan
                    aplikasi baris perintah. Anda harus menggunakan baris perintah atau SQLite API pada bahasa
                    pemrograman lain untuk menggunakan database SQLite. SQLite memiliki grafis front-end SQLite Browser
                    untuk bekerja dengan database SQLite secara grafis.
                    <br />
                    Berikut ini langkah-langkahnya:
                <ol class="space-y-1 ml-5 list-decimal list-inside my-2">
                    <li class="font-bold">
                        Pertama-tama perbarui cache repositori paket apt dengan perintah berikut:
                        <p class="italic font-normal flex justify-center my-3">sudo apt-get update</p>
                    </li>
                    <li class="font-bold mt-2">
                        Sekarang untuk menginstal SQLite, jalankan perintah berikut :
                        <p class="italic font-normal flex justify-center my-3">sudo apt-get install sqlite3</p>
                    </li>
                    <li class="font-bold mt-2">
                        SQLite sudah terinstall, untuk memastikan proses instalasi sudah benar, jalankan perintah
                        berikut:
                        <p class="italic font-normal flex justify-center my-3">sqlite3 --version</p>
                    </li>
                </ol>
                Sama seperti kita ketika berhasil menginstall MySQL, kita bisa menggunakan terminal untuk melakukan
                berbagai perintah dalam database. Untuk mempemudah melakukan pengelolaan database, kita memerlukan
                database GUI. Ada banyak pilihan dalam memilih GUI untuk SQLite, namun dalam tutorial ini
                mengg8nakan SQLite browser.
                </p>
            </div>
        </div>
    </div>
@endsection

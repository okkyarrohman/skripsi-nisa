@extends('layouts.app')

{{-- @dd($is_pass_deadline) --}}

@push('script-bottom')
    <script>
        const hapusForm = document.getElementById('mulai');

        hapusForm.onclick = function() {
            const lewatDeadline = @json($is_pass_deadline);
            const point = {{ $kategori->hasil->first()->total_points ?? 0 }};
            if (lewatDeadline) {
                Swal.fire({
                    title: 'Waktu kuis sudah berakhir!',
                    text: "Anda tidak bisa memulai kuis karena waktu kuis sudah berakhir!",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke'
                });
                return;
            }

            if (point > 0) {
                Swal.fire({
                    title: 'Anda sudah mengerjakan kuis ini!',
                    text: "Anda tidak bisa memulai kuis karena sudah mengerjakan kuis ini!",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oke'
                });
                return;
            }

            Swal.fire({
                title: 'Apakah anda yakin ingin memulai?',
                text: "Setelah mulai waktu kuis akan otomatis berjalan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Gaskan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    hapusForm.href = "{{ route('kuis.mulai', ['kategori_kuis' => $kategori->id]) }}";
                    hapusForm.click();
                }
            })
        }

        // function mulai(id) {
        //     const hapusForm = document.getElementById('mulai');
        //     Swal.fire({
        //         title: 'Apakah anda yakin ingin memulai?',
        //         text: "Setelah mulai waktu ujian akan otomatis berjalan!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, Gaskan!',
        //         cancelButtonText: 'Batal'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // hapusForm.submit();
        //             hapusForm.href = "{{ route('kuis.mulai', ['kategori_kuis' => $kategori->id]) }}";
        //             hapusForm.click();
        //         }
        //     })
        // }
    </script>
@endpush


@section('content')
    <div class="flex mt-0 mx-10">
        <div class="mt-0 w-1/2 mb-20 ml-4">
            <h1 class="font-bold text-xl ml-2">Daftar Kuis</h1>
            <ul class="p-2 menu dropdown-content z-[1] w-[90%] gap-7">
                @forelse ($categories as $item)
                    <li class="border rounded-xl shadow p-1">
                        <a class="" href="{{ route('kuis.edit', ['kui' => $item->id]) }}">
                            <div class="bg-[#ACC9E2] rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 h-4 text-[#055EA8]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                            </div>
                            {{ $item->kuis }}
                            <div class="flex justify-end w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
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
                            Belum ada kuis
                            <div class="flex justify-end w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </div>
                        </a>
                    </li>
                @endforelse

                {{-- <li class="border bg-[#ACC9E2] rounded-xl shadow p-1">
                    <a class="text-[#215784]" href="{{ route('kuis.edit', ['kui'=>1]) }}">
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
                    <a href="{{ route('kuis.edit', ['kui'=>1]) }}">
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
                    <a class="" href="{{ route('kuis.edit', ['kui'=>1]) }}">
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
                    <a class="" href="{{ route('kuis.edit', ['kui'=>1]) }}">
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
                </li> --}}
            </ul>
        </div>
        <div class="flex flex-col items-center mt-10 w-1/2 mx-10">
            <div class="border p-7 min-w-full">
                <p
                    class="border w-2/5 flex justify-center mb-8 items-center bg-[#F9D6D8] border-red-700 text-red-500 px-2 py-1">
                    Tenggat : {{ \Carbon\Carbon::parse($kategori->tenggat_waktu)->format('j F Y') }}</p>
                <div class="min-w-full">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-xl mb-4">{{ $kategori->kuis }}</h1>
                        <div class="flex">
                            {{ $kategori->hasil->first()->total_points ?? 0 }}/<p class="text-[#215784] font-semibold">100
                            </p>
                        </div>
                    </div>
                    <p class="text-justify min-w-full">{{ $kategori->deskripsi }}</p>
                </div>


                <div class="flex justify-end w-full mt-4 gap-x-11">
                    @if ($kategori->hasil->first()->total_points)
                        <a id="lihat" href="{{ route('kuis.show', ['kui' => $kategori->id]) }}"
                            class="flex items-center text-white bg-kuning p-2 rounded-lg font-bold">Lihat Nilai
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    @endif
                    <a id="mulai" href="#" class="flex items-center gap-4 text-[#E59B0C] font-bold">Mulai Kuis
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

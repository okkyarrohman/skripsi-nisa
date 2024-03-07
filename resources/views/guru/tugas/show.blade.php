@extends('layouts.app')

{{-- @dd($tugases) --}}

@push('script-bottom')
    <script>
        // Swal.fire({
        //     title: 'Berhasil!',
        //     text: 'tugas berhasil dihapus',
        //     icon: 'success',
        //     confirmButtonText: 'Oke'
        // })

        function hapus(id) {
            const hapusForm = document.getElementById('delete-' + id);
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "tugas yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    hapusForm.submit();
                }
            })
        }
    </script>
@endpush

@section('content')
    <div class="grid grid-cols-5 gap-4 mb-14">
        <div class="px-14 w-full col-span-3 space-y-5">
            {{-- BUTTON KUNING --}}
            <a href="{{ route('tugas-guru.create') }}"
                class="border-1 rounded border-kuning text-kuning block w-full p-2 text-center text-lg">
                <div class="flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Tambah Tugas
                </div>
            </a>

            <div class="w-full max-h-72 overflow-scroll space-y-6">
                <div class="flex items-center">
                    <h1 class="flex-grow text-xl font-semibold">Daftar tugas</h1>
                    <h1 class="w-24 text-xl font-semibold">Aksi</h1>
                </div>

                @forelse ($tugas_all as $item)
                    {{-- BUTTON --}}
                    <div class="flex items-center gap-3">
                        <a href="{{ route('tugas-guru.show', ['tugas_guru' => $item->id]) }}"
                            class="flex-grow flex justify-between items-center px-4 py-1 border rounded">
                            <div class="rounded-full p-2 bg-primary-blue">
                                <svg class="w-7 h-7 " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    stroke="#055EA8">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M14.9303 2.5V8.4C14.9303 8.84 14.4103 9.06 14.0903 8.77L12.3403 7.16C12.1503 6.98 11.8503 6.98 11.6603 7.16L9.91031 8.76C9.59031 9.06 9.07031 8.83 9.07031 8.4V2.5C9.07031 2.22 9.29031 2 9.57031 2H14.4303C14.7103 2 14.9303 2.22 14.9303 2.5Z"
                                            fill="#ACC9E2"></path>
                                        <path
                                            d="M16.98 2.05891C16.69 2.01891 16.43 2.26891 16.43 2.55891V8.57891C16.43 9.33891 15.98 10.0289 15.28 10.3389C14.58 10.6389 13.77 10.5089 13.21 9.98891L12.34 9.18891C12.15 9.00891 11.86 9.00891 11.66 9.18891L10.79 9.98891C10.43 10.3289 9.96 10.4989 9.49 10.4989C9.23 10.4989 8.97 10.4489 8.72 10.3389C8.02 10.0289 7.57 9.33891 7.57 8.57891V2.55891C7.57 2.26891 7.31 2.01891 7.02 2.05891C4.22 2.40891 3 4.29891 3 6.99891V16.9989C3 19.9989 4.5 21.9989 8 21.9989H16C19.5 21.9989 21 19.9989 21 16.9989V6.99891C21 4.29891 19.78 2.40891 16.98 2.05891ZM17.5 18.7489H9C8.59 18.7489 8.25 18.4089 8.25 17.9989C8.25 17.5889 8.59 17.2489 9 17.2489H17.5C17.91 17.2489 18.25 17.5889 18.25 17.9989C18.25 18.4089 17.91 18.7489 17.5 18.7489ZM17.5 14.7489H13.25C12.84 14.7489 12.5 14.4089 12.5 13.9989C12.5 13.5889 12.84 13.2489 13.25 13.2489H17.5C17.91 13.2489 18.25 13.5889 18.25 13.9989C18.25 14.4089 17.91 14.7489 17.5 14.7489Z"
                                            fill="#ACC9E2"></path>
                                    </g>
                                </svg>
                            </div>

                            <h1 class="text-lg font-semibold text-netral">{{ $item->nama }}</h1>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>

                        </a>
                        {{-- ACTION --}}
                        <div class="w-48 flex items-center justify-between">
                            <a href="{{ route('tugas-guru.edit', ['tugas_guru' => $item->id]) }}">
                                <div id="1-item" class="text-center space-y-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-black" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M3.548 20.938h16.9a.5.5 0 0 0 0-1h-16.9a.5.5 0 0 0 0 1M9.71 17.18a2.587 2.587 0 0 0 1.12-.65l9.54-9.54a1.75 1.75 0 0 0 0-2.47l-.94-.93a1.788 1.788 0 0 0-2.47 0l-9.54 9.53a2.473 2.473 0 0 0-.64 1.12L6.04 17a.737.737 0 0 0 .19.72a.767.767 0 0 0 .53.22Zm.41-1.36a1.468 1.468 0 0 1-.67.39l-.97.26l-1-1l.26-.97a1.521 1.521 0 0 1 .39-.67l.38-.37l1.99 1.99Zm1.09-1.08l-1.99-1.99l6.73-6.73l1.99 1.99Zm8.45-8.45L18.65 7.3l-1.99-1.99l1.01-1.02a.748.748 0 0 1 1.06 0l.93.94a.754.754 0 0 1 0 1.06" />
                                    </svg>
                                    <p>Edit</p>
                                </div>
                            </a>
                            <div id="1-item" class="text-center space-y-1 text-merah cursor-pointer"
                                onclick="hapus({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                                <p>Hapus</p>

                                <form action="{{ route('tugas-guru.destroy', ['tugas_guru' => $item->id]) }}" method="post"
                                    id="delete-{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                            <div id="1-item"
                                class="text-center space-y-1 cursor-pointer text-kuning border-2 border-kuning p-1 rounded">
                                Nilai Tugas
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="flex items
                    -center justify-center w-full h-36 bg-white rounded-lg shadow-md">
                        <p class="text-lg text-netral">Belum ada tugas</p>
                    </div>
                @endforelse

            </div>
        </div>
        <div class="px-4 col-span-2">
            <div class="w-full p-4 rounded-lg shadow-md">
                <h1 class="text-xl text-kuning font-semibold text-center mb-6">Detail Tugas</h1>

                <form action="{{ route('tugas-guru.update', ['tugas_guru' => $tugases->id]) }}" method="post"
                    class="space-y-3" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-2">
                        <p>Nama Tugas</p>
                        <input readonly type="text" name="nama" class="w-full border-1 rounded p-1 border-blue-border"
                            value="{{ $tugases->nama }}">
                    </div>


                    <div class="space-y-2">
                        <p>Sub Tugas</p>
                        <input readonly type="text" name="" class="w-full border-1 rounded p-1 border-blue-border"
                            id="">
                    </div>

                    {{-- <button class="border-1 rounded border-kuning text-kuning block w-full p-1 text-center text-base"
                        type="button">
                        <div class="flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p>
                                Tambah Sub Tugas
                            </p>
                        </div>
                    </button> --}}

                    <div class="space-y-2">
                        <p>Deskripsi Tugas</p>
                        <input readonly type="text" name="deskripsi"
                            class="w-full border-1 rounded p-1 border-blue-border" id=""
                            value="{{ $tugases->deskripsi }}">
                    </div>

                    @if ($tugases->dokumen)
                        <div>
                            <a href="{{ asset('storage/tugas/dokumen/' . $tugases->dokumen) }}" target="_blank"
                                class="rounded bg-kuning p-2">
                                Lihat Dokumen
                            </a>
                        </div>
                    @endif

                    {{-- <button type="submit" class="w-full mt-5 bg-kuning text-white rounded p-1">
                        Submit
                    </button> --}}

                </form>
            </div>
        </div>
    </div>
@endsection

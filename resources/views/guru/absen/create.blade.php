@extends('layouts.app')

{{-- @dd($materis) --}}

@push('script-bottom')
    <script>
        // Swal.fire({
        //     title: 'Berhasil!',
        //     text: 'Materi berhasil dihapus',
        //     icon: 'success',
        //     confirmButtonText: 'Oke'
        // })

        function hapus(id) {
            const hapusForm = document.getElementById('delete-' + id);
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Absen yang dihapus tidak dapat dikembalikan!",
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
    <div class="grid grid-cols-2 gap-4 mb-14">
        <div class="px-14 w-full space-y-5">
            {{-- BUTTON KUNING --}}
            <a href="{{ route('absen-guru.create') }}"
                class="border-1 rounded border-kuning text-kuning block w-full p-2 text-center text-lg hover:bg-kuning hover:text-white">
                <div class="flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Tambah Absen
                </div>
            </a>

            <div class="w-full max-h-72 overflow-scroll space-y-6">
                <div class="flex items-center">
                    <h1 class="flex-grow text-xl font-semibold">daftar absen</h1>
                    <h1 class="w-24 text-xl font-semibold">Aksi</h1>
                </div>

                @forelse ($absens as $item)
                    {{-- BUTTON --}}
                    <div class="flex items-center gap-3">
                        <a href="{{ route('absen-guru.show', ['absen_guru' => $item->id]) }}"
                            class="flex-grow flex justify-between items-center px-4 py-1 border rounded">
                            <div class="rounded-full p-2 ">
                                <img src="https://ui-avatars.com/api/?name={{ $item->name }}&background=random"
                                    class="rounded-full w-8 h-8" alt="">
                            </div>

                            <h1 class="text-lg font-semibold text-netral">{{ $item->nama_absen }}</h1>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>

                        </a>
                        {{-- ACTION --}}
                        <div class="w-24 flex items-center justify-between">
                            <a href="#">
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

                                <form action="{{ route('absen-guru.destroy', ['absen_guru' => $item->id]) }}" method="post"
                                    id="delete-{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="flex items
                    -center justify-center w-full h-36 bg-white rounded-lg shadow-md">
                        <p class="text-lg text-netral">Belum ada materi</p>
                    </div>
                @endforelse

            </div>
        </div>
        <div class="flex flex-col gap-2 px-4 items-center overflow-x-hidden">
            <div class="w-full p-4 rounded-lg shadow-md">
                <h1 class="text-xl text-kuning font-semibold text-center mb-6">Tambah Absen</h1>

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

                <form action="{{ route('absen-guru.store') }}" method="post" class="space-y-3"
                    enctype="multipart/form-data" id="form-tugas">
                    @csrf
                    @method('POST')

                    <div class="space-y-2">
                        <p>Nama Absen</p>
                        <input type="text" name="nama_absen" class="w-full border-1 rounded p-1 border-blue-border">
                    </div>

                    <div class="space-y-2">
                        <p>Tanggal Absen</p>
                        <input type="date" name="tanggal_absen" class="w-full border-1 rounded p-1 border-blue-border">

                    </div>

                    <button type="submit" class="w-full mt-5 bg-kuning text-white rounded p-1">
                        Submit
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection

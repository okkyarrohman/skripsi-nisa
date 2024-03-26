@extends('layouts.app')

{{-- @dd($kelompokes) --}}
{{-- @dd($result) --}}

@push('script-bottom')
    <script>
        // Swal.fire({
        //     title: 'Berhasil!',
        //     text: 'kelompok berhasil dihapus',
        //     icon: 'success',
        //     confirmButtonText: 'Oke'
        // })

        function hapus(id) {
            const hapusForm = document.getElementById('delete-' + id);
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "kelompok yang dihapus tidak dapat dikembalikan!",
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
    <div class="">
        <div class="px-14 w-full space-y-4">
            {{-- BUTTON KUNING --}}
            <a href="{{ route('data-murid.index') }}" class=" rounded text-kuning pl-0 p-2 text-center text-lg">
                {{-- HEADER --}}
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                    <h2 class="font-bold text-xl">
                        Daftar kelompok
                    </h2>
                </div>
            </a>

            {{-- TEXT --}}
            <button class="flex items-center p-2 bg-kuning rounded-md gap-2 float-end my-2"
                onclick="my_modal_3.showModal()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" class="w-8 h-8">
                    <path fill="#ffffff"
                        d="M25 42c-9.4 0-17-7.6-17-17S15.6 8 25 8s17 7.6 17 17s-7.6 17-17 17m0-32c-8.3 0-15 6.7-15 15s6.7 15 15 15s15-6.7 15-15s-6.7-15-15-15" />
                    <path fill="#ffffff" d="M16 24h18v2H16z" />
                    <path fill="#ffffff" d="M24 16h2v18h-2z" />
                </svg>
                <p class="text-white capitalize">
                    Buat kelompok
                </p>
            </button>


            {{-- MODAL BUAT KELOMPOK --}}
            <dialog id="my_modal_3" class="modal">
                <div class="modal-box">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>

                    <form action="" method="post" class="p-8 space-y-5">
                        @csrf
                        <h1 class="font-bold text-kuning text-3xl">Buat Kelompok</h1>

                        <div class="flex items-center gap-4">
                            <label for="" class="w-32">Nama Kelompok</label>
                            <input type="text" class="p-2 border rounded border-blue-border grow">
                        </div>
                        <div class="flex items-center gap-4">
                            <label for="" class="w-32">Kuota</label>
                            <input type="text" class="p-2 border rounded border-blue-border grow">
                        </div>

                        <button class="flex items-center p-2 bg-kuning rounded-md gap-2 float-end my-2" type="submit">
                            <p class="text-white capitalize">
                                Simpan
                            </p>
                        </button>
                    </form>
                </div>
            </dialog>


            {{-- TABLE --}}
            <table class="border-spacing-x-5 border-spacing-y-2 border-separate text-center w-full">
                <thead>
                    <tr class=" text-blue-border">
                        <th class="rounded font-thin text-center p-2 border-1 border-kuning mr-10">No</th>
                        <th class="rounded font-thin text-center px-12 border-1 border-kuning">Nama Kelompok</th>
                        {{-- subkelompok, preview, nilai --}}
                        <th class="rounded font-thin text-center px-12 border-1 border-kuning">Kuota</th>
                        <th class="rounded font-thin text-center px-12 border-1 border-kuning">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- GARIS BIRU --}}
                    <tr>
                        <td colspan="5" class="border-t-2 border-blue-border"></td>
                    </tr>
                    {{-- GARIS BIRU --}}


                    {{-- RENDER DATA --}}
                    {{-- @forelse ($result as $item)
                        <tr>
                            <td>1</td>
                            <td>{{$item->user->name}}</td>
                            <td>
                                1. Mengenal Abc
                            </td>
                            <td class="flex items-center justify-center gap-2 text-blue-border py-2">
                                Lihat <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M245.48 125.57c-.34-.78-8.66-19.23-27.24-37.81C201 70.54 171.38 50 128 50S55 70.54 37.76 87.76c-18.58 18.58-26.9 37-27.24 37.81a6 6 0 0 0 0 4.88c.34.77 8.66 19.22 27.24 37.8C55 185.47 84.62 206 128 206s73-20.53 90.24-37.75c18.58-18.58 26.9-37 27.24-37.8a6 6 0 0 0 0-4.88M128 194c-31.38 0-58.78-11.42-81.45-33.93A134.77 134.77 0 0 1 22.69 128a134.56 134.56 0 0 1 23.86-32.06C69.22 73.42 96.62 62 128 62s58.78 11.42 81.45 33.94A134.56 134.56 0 0 1 233.31 128C226.94 140.21 195 194 128 194m0-112a46 46 0 1 0 46 46a46.06 46.06 0 0 0-46-46m0 80a34 34 0 1 1 34-34a34 34 0 0 1-34 34" />
                                </svg>
                            </td>
                            <td class="border-1 border-kuning rounded text-kuning py-2">
                                / 100
                            </td>
                        </tr>
                    @empty --}}
                    <tr>
                        <td>1</td>
                        <td>Javascript</td>
                        <td>
                            1/5
                        </td>
                        <td class="flex items-center justify-center gap-2 text-blue-border py-2">
                            Lihat <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M245.48 125.57c-.34-.78-8.66-19.23-27.24-37.81C201 70.54 171.38 50 128 50S55 70.54 37.76 87.76c-18.58 18.58-26.9 37-27.24 37.81a6 6 0 0 0 0 4.88c.34.77 8.66 19.22 27.24 37.8C55 185.47 84.62 206 128 206s73-20.53 90.24-37.75c18.58-18.58 26.9-37 27.24-37.8a6 6 0 0 0 0-4.88M128 194c-31.38 0-58.78-11.42-81.45-33.93A134.77 134.77 0 0 1 22.69 128a134.56 134.56 0 0 1 23.86-32.06C69.22 73.42 96.62 62 128 62s58.78 11.42 81.45 33.94A134.56 134.56 0 0 1 233.31 128C226.94 140.21 195 194 128 194m0-112a46 46 0 1 0 46 46a46.06 46.06 0 0 0-46-46m0 80a34 34 0 1 1 34-34a34 34 0 0 1-34 34" />
                            </svg>
                        </td>
                    </tr>
                    {{-- @endforelse --}}

                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

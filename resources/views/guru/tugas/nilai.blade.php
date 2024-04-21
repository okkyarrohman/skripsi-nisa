@extends('layouts.app')

{{-- @dd($tugases) --}}
{{-- @dd($result) --}}

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

        function modalDetail(id) {
            my_modal_4.showModal();

            $.ajax({
                url: `/guru/nilai/${id}`,
                type: 'GET',
                success: function(response) {
                    console.log(response)
                    $('#nama_murid').text(response.user.name)
                    $('#nama_tugas').text(response.tugas.nama)
                    $('#nama_sub').text(response.subTugas.nama_sub_tugas)
                    $('#deskripsi_tugas').text(response.result.deskripsi)
                    $('#dokumen_tugas').attr('href', `/storage/tugas/answer/${response.result.answer}`)
                }
            });
        }
    </script>
@endpush

@section('content')
    <div class="">
        <div class="px-14 w-full space-y-4">
            {{-- BUTTON KUNING --}}
            <a href="{{ route('tugas-guru.index') }}" class=" rounded text-kuning pl-0 p-2 text-center text-lg">
                {{-- HEADER --}}
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                    <h2 class="font-bold text-xl">
                        Nilai Tugas
                    </h2>
                </div>
            </a>

            {{-- TEXT --}}
            <h1 class="text-text text-2xl mt-0">Nama Tugas : {{ $tugases->nama }}</h1>

            <!-- You can open the modal using ID.showModal() method -->
            {{-- <button class="btn" onclick="my_modal_4.showModal()">open modal</button> --}}
            <dialog id="my_modal_4" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="font-bold text-lg">Detail Tugas</h3>
                    {{-- nama murid, nama tugas, nama sub tugas, deskripsi tugas, button lihat dokumen tugas --}}
                    <div>

                        <div class="flex gap-5 mt-6">
                            <div class="flex flex-col gap-2">
                                <p class="font-bold">Nama Murid</p>
                                <p class="font-bold">Nama Tugas</p>
                                <p class="font-bold">Nama Sub Tugas</p>
                                <p class="font-bold">Deskripsi Tugas</p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p id="nama_murid">Udin</p>
                                <p id="nama_tugas">Menulis</p>
                                <p id="nama_sub">Mengenal Abc</p>
                                <textarea name="" class="w-96 min-h-32 p-2 border-2 rounded-lg border-blue-700" readonly id="deskripsi_tugas"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-center mt-6">
                            <a target="_blank" id="dokumen_tugas" class="btn">Lihat Dokumen Tugas</a>
                        </div>
                    </div>

                    <div class="modal-action">
                        <form method="dialog">
                            <!-- if there is a button, it will close the modal -->
                            <button class="btn">Close</button>
                        </form>
                    </div>
                </div>
            </dialog>


            {{-- TABLE --}}
            <table class="border-spacing-x-5 border-spacing-y-2 border-separate text-center">
                <thead>
                    <tr class=" text-blue-border">
                        <th class="rounded font-thin text-center p-2 border-1 border-kuning mr-10">No</th>
                        <th class="rounded font-thin text-center px-12 border-1 border-kuning">Nama Siswa</th>
                        <th class="rounded font-thin text-center px-12 border-1 border-kuning">Sub Tugas</th>
                        <th class="rounded font-thin text-center px-12 border-1 border-kuning">Preview</th>
                        <th class="rounded font-thin text-center px-14 border-1 border-kuning">Nilai</th>
                        <th class="rounded font-thin text-center px-14 border-1 border-kuning">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- GARIS BIRU --}}
                    <tr>
                        <td colspan="5" class="border-t-2 border-blue-border"></td>
                    </tr>
                    {{-- GARIS BIRU --}}


                    {{-- RENDER DATA --}}
                    @forelse ($result as $item)
                        <tr>
                            <td>1</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                {{ $item->subTugas->nama_sub_tugas }}
                            </td>
                            <td class="flex items-center justify-center gap-2 text-blue-border py-2 cursor-pointer hover:bg-slate-500 hover:text-white rounded-lg"
                                onclick="modalDetail({{ $item->id }})">
                                Lihat Detail <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M245.48 125.57c-.34-.78-8.66-19.23-27.24-37.81C201 70.54 171.38 50 128 50S55 70.54 37.76 87.76c-18.58 18.58-26.9 37-27.24 37.81a6 6 0 0 0 0 4.88c.34.77 8.66 19.22 27.24 37.8C55 185.47 84.62 206 128 206s73-20.53 90.24-37.75c18.58-18.58 26.9-37 27.24-37.8a6 6 0 0 0 0-4.88M128 194c-31.38 0-58.78-11.42-81.45-33.93A134.77 134.77 0 0 1 22.69 128a134.56 134.56 0 0 1 23.86-32.06C69.22 73.42 96.62 62 128 62s58.78 11.42 81.45 33.94A134.56 134.56 0 0 1 233.31 128C226.94 140.21 195 194 128 194m0-112a46 46 0 1 0 46 46a46.06 46.06 0 0 0-46-46m0 80a34 34 0 1 1 34-34a34 34 0 0 1-34 34" />
                                </svg>
                            </td>
                            <td class="border-1 border-kuning rounded text-kuning p-0 m-0">
                                <input type="text" name="nilai" id="" class="p-1 m-0">
                            </td>
                            <td class="flex items-center gap-4 text-white">
                                <form action="">
                                    <button type="submit" class="bg-sky-800 p-2 rounded-lg hover:bg-sky-600">
                                        Beri Nilai
                                    </button>
                                </form>

                                <form action="">
                                    <button type="submit" class="bg-sky-800 p-2 rounded-lg hover:bg-sky-600">
                                        Hapus Data
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>1</td>
                            <td>udin</td>
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
                    @endforelse

                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

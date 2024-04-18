@extends('layouts.app')

{{-- @dd($kelompok[0]->murids->count()) --}}
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

        function modal(id) {
            $.ajax({
                url: '/guru/kelompok-guru/' + id + '/edit',
                type: 'GET',
                success: function(response) {
                    console.log(response)
                    $('#edit-nama').val(response.nama);
                    $('#edit-kuota').val(response.kuota);
                    $('input[name="edit-id"]').val(response.id);
                    $('#edit-form').attr('action', '/guru/kelompok-guru/' + response.id);
                    document.getElementById('my_modal_4').showModal();
                    // $('#editKelompok').html(response);
                    // $('#editModal').modal('show');
                }
            });
        }
    </script>
@endpush

@section('content')
    <div class="">
        <div class="px-14 w-full space-y-4">
            <input type="hidden" name="edit-id">
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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {{-- MODAL EDIT KELOMPOK --}}
            <dialog id="my_modal_4" class="modal">
                <div class="modal-box">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>

                    <form action="{{ route('kelompok-guru.update', ['kelompok_guru' => 1]) }}" method="post"
                        class="p-8 space-y-5" id="edit-form">
                        @csrf
                        @method('PUT')
                        <h1 class="font-bold text-kuning text-3xl">EDIT Kelompok</h1>

                        <div class="flex items-center gap-4">
                            <label for="" class="w-32">Nama Kelompok</label>
                            <input type="text" class="p-2 border rounded border-blue-border grow" name="nama"
                                id="edit-nama">
                        </div>
                        <div class="flex items-center gap-4">
                            <label for="" class="w-32">Kuota</label>
                            <input type="text" class="p-2 border rounded border-blue-border grow" name="kuota"
                                id="edit-kuota">
                        </div>

                        <button class="flex items-center p-2 bg-kuning rounded-md gap-2 float-end my-2" id="edit-btn"
                            type="submit">
                            <p class="text-white capitalize">
                                Simpan
                            </p>
                        </button>
                    </form>
                </div>
            </dialog>

            {{-- MODAL BUAT KELOMPOK --}}
            <dialog id="my_modal_3" class="modal">
                <div class="modal-box">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>

                    <form action="{{ route('kelompok-guru.store') }}" method="post" class="p-8 space-y-5">
                        @csrf
                        <h1 class="font-bold text-kuning text-3xl">Buat Kelompok</h1>

                        <div class="flex items-center gap-4">
                            <label for="" class="w-32">Nama Kelompok</label>
                            <input type="text" class="p-2 border rounded border-blue-border grow" name="nama">
                        </div>
                        <div class="flex items-center gap-4">
                            <label for="" class="w-32">Kuota</label>
                            <input type="text" class="p-2 border rounded border-blue-border grow" name="kuota">
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
                    @forelse ($kelompoks as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                {{ $item->murids->count() }} / {{ $item->kuota }}
                            </td>
                            <td class="flex items-center justify-center gap-8 text-blue-border py-2">
                                <button class="flex items-center gap-2" onclick="modal({{ $item->id }})">
                                    Edit
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M3.548 20.938h16.9a.5.5 0 0 0 0-1h-16.9a.5.5 0 0 0 0 1M9.71 17.18a2.587 2.587 0 0 0 1.12-.65l9.54-9.54a1.75 1.75 0 0 0 0-2.47l-.94-.93a1.788 1.788 0 0 0-2.47 0l-9.54 9.53a2.473 2.473 0 0 0-.64 1.12L6.04 17a.737.737 0 0 0 .19.72a.767.767 0 0 0 .53.22Zm.41-1.36a1.468 1.468 0 0 1-.67.39l-.97.26l-1-1l.26-.97a1.521 1.521 0 0 1 .39-.67l.38-.37l1.99 1.99Zm1.09-1.08l-1.99-1.99l6.73-6.73l1.99 1.99Zm8.45-8.45L18.65 7.3l-1.99-1.99l1.01-1.02a.748.748 0 0 1 1.06 0l.93.94a.754.754 0 0 1 0 1.06" />
                                    </svg>
                                </button>

                                <button class="flex items-center gap-2" onclick="hapus({{ $item->id }})">
                                    Delete
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                    </svg>
                                </button>

                            </td>
                        </tr>

                        <form action="{{ route('kelompok-guru.destroy', ['kelompok_guru' => $item->id]) }}"
                            method="post" id="delete-{{ $item->id }}">
                            @csrf
                            @method('delete')
                        </form>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data</td>
                        </tr>
                    @endforelse

                    {{-- @endforelse --}}

                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

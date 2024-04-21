@extends('layouts.app')

{{-- @dd($absen->absenMurids) --}}

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
    <div class="grid gap-4 mb-14 place-items-center">
        <table class="border-spacing-x-5 border-spacing-y-2 border-separate text-center">
            <thead>
                <tr class=" text-blue-border">
                    <th class="rounded font-thin text-center p-2 border-1 border-kuning mr-10">No</th>
                    <th class="rounded font-thin text-center px-12 border-1 border-kuning">Nama Siswa</th>
                    <th class="rounded font-thin text-center px-12 border-1 border-kuning">Nomor Absen</th>
                    <th class="rounded font-thin text-center px-12 border-1 border-kuning">Tanggal Absen</th>
                    <th class="rounded font-thin text-center px-12 border-1 border-kuning">Jam Absen</th>
                </tr>
            </thead>
            <tbody>
                {{-- GARIS BIRU --}}
                <tr>
                    <td colspan="5" class="border-t-2 border-blue-border"></td>
                </tr>

                @php
                    use Carbon\Carbon;
                @endphp

                @forelse ($absen->absenMurids as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- hard data --}}
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->no_absen }}</td>
                        <td>{{ \Carbon\Carbon::parse($absen->tanggal_absen)->setTimezone('Asia/Jakarta')->format('d-M-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->jam_absen)->setTimezone('Asia/Jakarta')->format('H:i') }}
                        WIB </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada absen</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

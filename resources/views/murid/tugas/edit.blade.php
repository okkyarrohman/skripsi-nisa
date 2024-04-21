@extends('layouts.app')

@push('script-bottom')
    <script>
        const btnFile = document.getElementById('btn-file');
        const fileUpload = document.getElementById('file-upload');
        const gantiDok = document.getElementById('ganti-dok');

        gantiDok.addEventListener('click', () => {
            fileUpload.click();
        });

        // if file upload has no value
        btnFile.addEventListener('click', () => {
            if (!fileUpload.value) {
                fileUpload.click();
            } else if (fileUpload.value) {
                $('#form-tugas').submit();
            }
        });

        fileUpload.addEventListener('change', () => {
            // fileUpload not hidden
            if (fileUpload.value) {
                btnFile.innerHTML = 'Unggah Sekarang';
                fileUpload.classList.remove('hidden');
            }
        });
    </script>
@endpush

@section('content')
    <div class="mb-20">
        <div class="flex flex-col items-center mt-10 mx-10">
            <div class="border p-7 w-full">
                <p
                    class="border w-fit flex justify-center mb-8 items-center bg-[#F9D6D8] border-red-700 text-red-500 px-2 py-1">
                    Tenggat : {{ \Carbon\Carbon::createFromTimestamp(strtotime($tugases->tenggat_waktu))->format('d M Y') }}
                </p>
                <div class="">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-xl mb-4">Deskripsi Tugas</h1>
                        <div class="flex">
                            {{ $nilai_murid == 'Belum mengumpulkan' ? 'Belum mengumpulkan' : $tugas_murid->tugasResult->first()->nilai . ' / 100' }}
                        </div>
                    </div>
                    <p class="text-justify">
                        {{ $tugases->deskripsi }}
                    </p>
                </div>
                <form action="{{ route('tugas.store') }}" method="POST" id="form-tugas" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tugas_id" value="{{ $tugases->id }}">
                    <input type="hidden" name="sub_tugas_id" value="{{ request()->sub }}">
                    <div>
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
                        <div class="flex items-center gap-5 mt-6">
                            <label for="nama" class=" font-semibold">Nama</label>
                            <input name="name" type="text" placeholder="okky" class="border w-80 p-2"
                                {{ $nilai_murid != 'Belum mengumpulkan' ? 'disabled' : '' }}
                                value="{{ $nilai_murid != 'Belum mengumpulkan' ? $tugas_murid->tugasResult->first()->name : '' }}">

                        </div>
                        <div class="flex items-center gap-5 mt-6">
                            <label for="absen" class=" font-semibold">Absen</label>
                            <input name="no_absen" type="text" placeholder="20012" class="border w-80 p-2"
                                {{ $nilai_murid != 'Belum mengumpulkan' ? 'disabled' : '' }}
                                value="{{ $nilai_murid != 'Belum mengumpulkan' ? $tugas_murid->tugasResult->first()->no_absen : '' }}">
                        </div>
                    </div>

                    <div>
                        <textarea name="deskripsi" id="" class="w-full p-2 border-kuning border-1 mt-2 rounded-md" rows="6"
                            placeholder="deskripsi jawaban" {{ $nilai_murid != 'Belum mengumpulkan' ? 'disabled' : '' }}>{{ $nilai_murid != 'Belum mengumpulkan' ? $tugas_murid->tugasResult->first()->deskripsi : '' }}</textarea>
                    </div>

                    <div class="">
                        @if ($nilai_murid != 'Belum mengumpulkan')
                            {{-- lihat file tugas --}}
                            <a target="_blank"
                                href="{{ asset('storage/tugas/answer') . '/' . $tugas_murid->tugasResult->first()->answer }}"
                                class="flex items-center gap-4 justify-center text bg-[#E59B0C] text-white border border-gray-300 rounded-xl py-2 font-semibold cursor-pointer p-1 px-3 hover:bg-yellow-700">
                                Lihat File Tugas
                            </a>
                        @else
                            <div class="mt-0">
                                <div class="file_upload ">
                                    <!-- <svg class="text-indigo-500 w-24 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg> -->

                                    <div class="input_field ">
                                        <div class="flex justify-between mt-4 mb-5">
                                            <input name="answer" class="text-sm cursor-pointer text-kuning" type="file"
                                                id="file-upload" />

                                            <button id="ganti-dok"
                                                class="py-2 px-1 rounded border-1 border-kuning text-kuning font-semibold"
                                                type="button">
                                                Ganti Dokumen
                                            </button>
                                        </div>
                                        <div id="btn-file"
                                            class="flex items-center gap-4 justify-center text bg-[#E59B0C] text-white border border-gray-300 rounded-xl py-2 font-semibold cursor-pointer p-1 px-3 hover:bg-yellow-700">
                                            Unggah Tugas
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                            </svg>
                                        </div>

                                        <!-- <div class="title text-indigo-500 uppercase">or drop files here</div> -->
                                    </div>

                                </div>
                            </div>
                        @endif

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

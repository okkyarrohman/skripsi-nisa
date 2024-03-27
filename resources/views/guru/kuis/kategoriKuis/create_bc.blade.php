@extends('layouts.app')

@section('content')
    <div class="mt-0 m-16">
        <div class="flex justify-between mb-6">
            <div>
                <div class="flex gap-4 mt-4 items-center">
                    <label for="nama">Nama Kuis</label>
                    <input id="nama" type="text" class="border w-96 rounded-lg px-4 py-2" placeholder="nama kuis">
                </div>
                <div class="flex gap-4 mt-4 items-center">
                    <label for="">Waktu Kuis</label>
                    <input type="datetime-local" class="border rounded-lg px-4 py-2" placeholder="nama kuis">
                </div>
            </div>
        </div>
        <div class="mt-4 mb-5">
            <div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
                Soal 1
            </div>
            <p class="mb-3">
                <textarea name="soal" class="border w-full rounded-lg px-4 py-2" id="" placeholder="Isi Soal"></textarea>
            </p>
            {{-- OPSI --}}
            <div>
                
            </div>
            <div class="flex items-center gap-4">
                <label for="opsi-1">Opsi 1</label>
                <input type="text" name="opsi-1" id="opsi-1" class="border rounded-lg px-4 py-2 w-1/2"
                    placeholder="Opsi 1">
            </div>
            <div class="flex items-center gap-4">
                <label for="opsi-2">Opsi 2</label>
                <input type="text" name="opsi-2" id="opsi-2" class="border rounded-lg px-4 py-2 w-1/2"
                    placeholder="Opsi 2">
            </div>

            <div class="flex flex-col gap-2">
                <div class="flex gap-4 items-center">
                    <input type="radio" name="jawaban" id="jawaban1">
                    <label for="jawaban1">Jawaban 1</label>
                </div>
                <div class="flex gap-4 items-center">
                    <input type="radio" name="jawaban" id="jawaban2">
                    <label for="jawaban2">Jawaban 2</label>
                </div>
                <div class="flex gap-4 items-center">
                    <input type="radio" name="jawaban" id="jawaban3">
                    <label for="jawaban3">Jawaban 3</label>
                </div>
                <div class="flex gap-4 items-center">
                    <input type="radio" name="jawaban" id="jawaban4">
                    <label for="jawaban4">Jawaban 4</label>
                </div>
            </div>
        </div>

        <button
            class="border-1 rounded border-kuning text-kuning block p-2 text-center text-lg hover:bg-kuning hover:text-white">
            Simpan Kuis
        </button>

    </div>
@endsection

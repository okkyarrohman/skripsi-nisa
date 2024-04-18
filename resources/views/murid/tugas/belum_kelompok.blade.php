{{-- @extends('layouts.app') --}}

@section('content')
    <div class="flex justify-center my-10 mt-0 w-full">
        <div class="flex items-center justify-center w-3/4 gap-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
            role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
            </svg>
            <span class="block sm:inline">Anda belum tergabung dalam kelompok!</span>
        </div>
    </div>
    <div class="flex items-center justify-center mt-5 mb-10">
        <table class="table-fixed w-2/3">
            <thead class="border-b border-b-[#215784] m-3">
                <tr class="gap-8">
                    <th class="w-12 text-center text-blue-border">
                        <p class="m-3 border-1 border-[#E59B0C] py-2 w-10">No</p>
                    </th>
                    <th class="text-center text-blue-border">
                        <p class="mx-5 border-1 border-[#E59B0C] py-2">Nama Kelompok</p>
                    </th>
                    <th class="text-center text-blue-border">
                        <p class="mx-5 border-1 border-[#E59B0C] py-2">Kuota</p>
                    </th>
                    <th class="text-center text-blue-border">
                        <p class="mx-5 border-1 border-[#E59B0C] py-2">Aksi</p>
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($kelompoks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->murids->count() }}/{{ $item->kuota }}</td>
                        <td>
                            <form action="{{ route('kelompok-murid.store', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                <button type="submit">
                                    <div
                                        class="bg-[#36C879] hover:bg-green-700 flex items-center justify-center text-white font-bold py-3 mx-7 my-2 px-4">
                                        Gabung</div>
                                </button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada kelompok</td>
                    </tr>
                @endforelse

                {{-- <tr>
                    <td>1</td>
                    <td>JavaScript</td>
                    <td>1/5</td>
                    <td>
                        <a href="{{ route('tugas.index') }}">
                            <div
                                class="bg-[#36C879] hover:bg-green-700 flex items-center justify-center text-white font-bold py-3 mx-7 my-2 px-4">
                                Gabung</div>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Python</td>
                    <td>3/5</td>
                    <td>
                        <a href="{{ route('tugas.index') }}">
                            <div class="bg-[#36C879] hover:bg-green-700 text-white font-bold py-3 mx-7 my-2 px-4">
                                Gabung</div>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>PHP</td>
                    <td>2/5</td>
                    <td><a href="{{ route('tugas.index') }}">
                            <div class="bg-[#36C879] hover:bg-green-700 text-white font-bold py-3 mx-7 my-2 px-4">
                                Gabung</div>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Java</td>
                    <td>4/5</td>
                    <td><a href="{{ route('tugas.index') }}">
                            <div class="bg-[#36C879] hover:bg-green-700 text-white font-bold py-3 mx-7 my-2 px-4">
                                Gabung</div>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>C++</td>
                    <td>5/5</td>
                    <td><a href="{{ route('tugas.index') }}">
                            <div class="bg-[#36C879] hover:bg-green-700 text-white font-bold py-3 mx-7 my-2 px-4">
                                Gabung</div>
                        </a>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
@endsection

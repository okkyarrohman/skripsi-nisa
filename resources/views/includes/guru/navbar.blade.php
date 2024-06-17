<div class="bg-gradient-to-b from-[#215784] to-[#306FA4] justify-center items-center py-8 px-44 text-center">
    <h1 class="text-white text-3xl font-semibold">Media Pembelajaran Berbasis Website Interaktif Mata Pelajaran
        Pemrograman Terstruktur </h1>
</div>
<div class="mt-7 flex justify-between px-16 text-[#A2A3A7]">
    <a href="{{ route('materi-guru.index') }}"
        class=" {{ request()->routeIs('tugas-guru.nilai') ? 'mb-2' : 'mb-5' }}  inline-block rounded-sm {{ request()->routeIs('materi-guru*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Materi</a>
    <a href="{{ route('tugas-guru.index') }}"
        class="{{ request()->routeIs('tugas-guru.nilai') ? 'mb-2' : 'mb-5' }}  inline-block rounded-sm {{ request()->routeIs('tugas-guru*') || request()->routeIs('tugas-guru.nilai') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Tugas</a>
    <a href="{{ route('data-murid.index') }}"
        class="{{ request()->routeIs('tugas-guru.nilai') ? 'mb-2' : 'mb-5' }}  inline-block rounded-sm {{ request()->routeIs('data-murid*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Data
        Siswa</a>
    <a href="{{ route('kategori.index') }}"
        class="{{ request()->routeIs('kategori.index') ? 'mb-2' : 'mb-5' }}  inline-block rounded-sm {{ request()->routeIs('kategori.*', 'soal.*', 'opsi.*', 'hasil.*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Kuis</a>
    <a href="{{ route('referensi-guru.index') }}"
        class="{{ request()->routeIs('tugas-guru.nilai') ? 'mb-2' : 'mb-5' }}  inline-block rounded-sm {{ request()->routeIs('referensi-guru*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Referensi</a>
    {{-- <a href="{{ route('tutorial-guru.index') }}"
        class="{{ request()->routeIs('tugas-guru.nilai') ? 'mb-2' : 'mb-5' }}  inline-block rounded-sm {{ request()->routeIs('tutorial-guru*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Tutorial</a> --}}
    <a href="{{ route('absen-guru.index') }}"
        class="mb-0 inline-block rounded-sm {{ request()->routeIs('absen*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Absen</a>
    <a href="{{ route('download-panduan.guru') }}"
        class="mb-0 inline-block rounded-sm {{ request()->routeIs('download-panduan.guru') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Panduan</a>
</div>

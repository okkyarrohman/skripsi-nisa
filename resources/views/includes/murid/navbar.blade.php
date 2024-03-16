<div class="bg-gradient-to-b from-[#215784] to-[#306FA4] justify-center items-center py-8 px-44 text-center">
    <h1 class="text-white text-3xl font-semibold">Media Pembelajaran Berbasis Website Interaktif Mata Pelajaran
        Pemrograman Terstruktur </h1>
</div>
<div class="mt-7 flex justify-between px-16 text-[#A2A3A7]">
    <a href="{{ route('materi.index') }}"
        class=" {{ request()->routeIs('materi.index') ? 'mb-2' : 'mb-0' }}  inline-block rounded-sm {{ request()->routeIs('materi*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Materi</a>
    <a href="{{ route('tugas.belum_kelompok') }}"
        class="{{ request()->routeIs('tugas.index') ? 'mb-2' : 'mb-0' }}  inline-block rounded-sm {{ request()->routeIs('tugas*') || request()->routeIs('tugas.index') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Tugas</a>
    <a href="{{ route('kuis.index') }}"
        class="{{ request()->routeIs('kuis.index') ? 'mb-2' : 'mb-0' }}  inline-block rounded-sm {{ request()->routeIs('kuis*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Kuis</a>
    <a href="{{ route('referensi.index') }}"
        class="{{ request()->routeIs('referensi.index') ? 'mb-2' : 'mb-0' }}  inline-block rounded-sm {{ request()->routeIs('referensi*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Referensi</a>
    <a href="{{ route('tutorial.index') }}"
        class="{{ request()->routeIs('tutorial.index') ? 'mb-2' : 'mb-0' }}  inline-block rounded-sm {{ request()->routeIs('tutorial*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Tutorial</a>
    <a href="#">Absen</a>
</div>

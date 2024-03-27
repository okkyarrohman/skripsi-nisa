<div class="mt-0 flex justify-between px-16 text-[#A2A3A7]">
    {{-- kategori kuis --}}
    <a href="{{ route('kategori.index') }}"
        class="{{ request()->routeIs('kategori.index') ? 'mb-2' : 'mb-0' }}  inline-block rounded-sm {{ request()->routeIs('kategori*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Kategori
        Kuis</a>
    {{-- soal kuis --}}
    <a href="{{ route('soal.index') }}"
        class="{{ request()->routeIs('soal.index') ? 'mb-2' : 'mb-0' }}  inline-block rounded-sm {{ request()->routeIs('soal*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Soal
        Kuis</a>
    {{-- opsi kuis --}}
    <a href="{{ route('opsi.index') }}"
        class="{{ request()->routeIs('opsi.index') ? 'mb-2' : 'mb-0' }}  inline-block rounded-sm {{ request()->routeIs('opsi*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Opsi
        Kuis</a>
    {{-- hasil kuis --}}
    <a href="{{ route('hasil.index') }}"
        class="{{ request()->routeIs('hasil.index') ? 'mb-2' : 'mb-0' }}  inline-block rounded-sm {{ request()->routeIs('hasil*') ? 'text-[#215784] border-[#215784] border-b-4' : '' }}">Hasil
        Kuis</a>
</div>

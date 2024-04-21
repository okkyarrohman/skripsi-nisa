<?php

namespace App\Http\Controllers\Guru\Kuis;

use App\Http\Controllers\Controller;
use App\Models\KategoriKuis;
use Illuminate\Http\Request;

class KategoriKuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = KategoriKuis::all();

        return view('guru.kuis.kategoriKuis.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriKuis::all();

        return view('guru.kuis.kategoriKuis.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        KategoriKuis::create([
            'kuis' => $request->input('kuis'),
            'waktu' => $request->input('waktu'),
            'deskripsi' => $request->input('deskripsi'),
            'tenggat_waktu' => $request->input('tenggat_waktu')
        ]);

        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategoris = KategoriKuis::all();
        $kategori = KategoriKuis::find($id);
        return view('guru.kuis.kategoriKuis.show', compact('kategoris', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $kategoris = KategoriKuis::all();
        $kategori = KategoriKuis::find($id);
        return view('guru.kuis.kategoriKuis.edit', compact('kategoris', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategoris = KategoriKuis::find($id);
        $kategoris->kuis = $request->kuis;
        $kategoris->waktu = $request->waktu;
        $kategoris->deskripsi = $request->deskripsi;
        $kategoris->tenggat_waktu = $request->tenggat_waktu;
        $kategoris->save();

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoris = KategoriKuis::find($id);
        $kategoris->delete();
        return redirect()->route('kategori.index');
    }
}

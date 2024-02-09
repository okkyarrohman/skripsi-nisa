<?php

namespace App\Http\Controllers\Guru\Kuis;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use Illuminate\Http\Request;

class SoalKuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('guru.kuis.soal.index', compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.kuis.soal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $soals = Soal::create([
            'kategori_kuis_id' => $request->input('kategori_kuis_id'),
            'soal' => $request->input('soal')
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $extension = $gambar->getClientOriginalName();
            $gambarName = date('Ymd') . "." . $extension;
            $gambar->move(storage_path('app/public/kuis/soal/gambar/'), $gambarName);
            $soals->gambar = $gambarName;
            $soals->save();
        }
        return redirect()->route('soal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $soals = Soal::find($id)->first();
        return view('guru.kuis.soal.show', compact('soals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $soals = Soal::find($id)->first();
        return view('guru.kuis.soal.edit', compact('soals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $soals = Soal::find($id)->first();
        $soals->kategori_kuis_id = $request->kategori_kuis_id;
        $soals->soal = $request->soal;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $extension = $gambar->getClientOriginalName();
            $gambarName = date('Ymd') . "." . $extension;
            $gambar->move(storage_path('app/public/kuis/soal/gambar/'), $gambarName);
            $soals->gambar = $gambarName;
        }
        $soals->save();
        return redirect()->route('soal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $soals = Soal::find($id)->first();
        $soals->delete();
        return redirect()->route('soal.index');
    }
}

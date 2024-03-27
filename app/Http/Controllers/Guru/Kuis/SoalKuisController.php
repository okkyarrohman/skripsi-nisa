<?php

namespace App\Http\Controllers\Guru\Kuis;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use App\Models\KategoriKuis;
use Illuminate\Http\Request;

class SoalKuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $soals = Soal::all();
        $kategoris = KategoriKuis::all();
        $soals = Soal::with('kategori')->get();
        return view('guru.kuis.soal.index', compact('soals', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriKuis::all();
        return view('guru.kuis.soal.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $soals = Soal::create([
        //     'kategori_kuis_id' => $request->input('kategori_kuis_id'),
        //     'soal' => $request->input('soal')
        // ]);

        // if ($request->hasFile('gambar')) {
        //     $gambar = $request->file('gambar');
        //     $extension = $gambar->getClientOriginalName();
        //     $gambarName = date('Ymd') . "." . $extension;
        //     $gambar->move(storage_path('app/public/kuis/soal/gambar/'), $gambarName);
        //     $soals->gambar = $gambarName;
        //     $soals->save();
        // }
        // return redirect()->route('soal.index');

        // MULTIPLE INPUT
        // Mendapatkan jumlah soal dari input form

        // dd($request->hasFile('gambar'), $request->file('gambar')[0]);
        $jumlahSoal = count($request->input('soal'));

        // Iterasi melalui setiap soal
        // for ($i = 0; $i < $jumlahSoal; $i++) {
        //     $soal = Soal::create([
        //         'kategori_kuis_id' => $request->input('kategori_kuis_id'),
        //         'soal' => $request->input('soal')[$i] // Mengambil soal dengan index $i
        //     ]);

        // if ($request->hasFile('gambar')) {
        //     $gambar = $request->file('gambar')[$i]; // Mengambil file gambar dengan index $i
        //     $extension = $gambar->getClientOriginalName();
        //     $gambarName = date('Ymd') . "_" . ($i + 1) . "." . $extension; // Menambahkan nomor urut ke nama file
        //     $gambar->move(storage_path('app/public/kuis/soal/gambar/'), $gambarName);
        //     $soal->gambar = $gambarName;
        //     $soal->save();
        // }
        // }

        // dd($jumlahSoal);

        for ($i = 0; $i < $jumlahSoal; $i++) {
            // Cek apakah soal sudah ada dalam database
            if (isset($request->input('soal_id')[$i])) {
                // Jika sudah ada, lakukan operasi update
                $soal = Soal::findOrFail($request->input('soal_id')[$i]);

                $soal->update([
                    'kategori_kuis_id' => $request->input('kategori_kuis_id'),
                    'soal' => $request->input('soal')[$i],
                ]);

                if ($request->hasFile('gambar') && isset($request->file('gambar')[$i])) {
                    $gambar = $request->file('gambar')[$i]; // Mengambil file gambar dengan index $i
                    $extension = $gambar->getClientOriginalName();
                    $gambarName = date('Ymd') . "_" . ($i + 1) . "." . $extension; // Menambahkan nomor urut ke nama file
                    $gambar->move(storage_path('app/public/kuis/soal/gambar/'), $gambarName);
                    $soal->gambar = $gambarName;
                    $soal->save();
                }
            } else {
                // Jika belum ada, lakukan operasi penambahan
                $soal = Soal::create([
                    'kategori_kuis_id' => $request->input('kategori_kuis_id'),
                    'soal' => $request->input('soal')[$i],
                ]);

                if ($request->hasFile('gambar') && isset($request->file('gambar')[$i])) {
                    $gambar = $request->file('gambar')[$i]; // Mengambil file gambar dengan index $i
                    $extension = $gambar->getClientOriginalName();
                    $gambarName = date('Ymd') . "_" . ($i + 1) . "." . $extension; // Menambahkan nomor urut ke nama file
                    $gambar->move(storage_path('app/public/kuis/soal/gambar/'), $gambarName);
                    $soal->gambar = $gambarName;
                    $soal->save();
                }
            }
        }
        return redirect()->route('soal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategoris = KategoriKuis::all();
        $soals = Soal::where('kategori_kuis_id', $id)->get();
        return view('guru.kuis.soal.show', compact('soals', 'kategoris', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoris = KategoriKuis::all();
        $soals = Soal::where('kategori_kuis_id', $id)->get();
        $kategori_id = $id;
        // where kategori_kuis_id
        return view('guru.kuis.soal.edit', compact('soals', 'kategoris', 'kategori_id'));
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

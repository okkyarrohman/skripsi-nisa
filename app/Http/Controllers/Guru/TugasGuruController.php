<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\TugasResult;

class TugasGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugases = Tugas::all();

        return view('guru.tugas.index', compact('tugases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tugases = Tugas::all();
        $kelompoks = Kelompok::all();

        return view('guru.tugas.create', compact('tugases', 'kelompoks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kelompok_id' => 'required',
            'tenggat_waktu' => 'required',
            'dokumen' => 'required',
            'sub_tugas' => 'required'
        ]);
        $tugases = Tugas::create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'kelompok_id' => $request->input('kelompok_id'),
            'tenggat_waktu' => $request->input('tenggat_waktu'),
        ]);
        if ($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen');
            $extension = $dokumen->getClientOriginalName();
            $dokumenName = date('Ymd') . "." . $extension;
            $dokumen->move(storage_path('app/public/tugas/dokumen/'), $dokumenName);
            $tugases->dokumen = $dokumenName;
            $tugases->save();
        }

        foreach ($request->input('sub_tugas') as $sub) {
            $tugases->subTugas()->create([
                'nama_sub_tugas' => $sub,
                'tugas_id' => $tugases->id
            ]);
        }

        return redirect()->route('tugas-guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugases = Tugas::find($id);
        $tugas_all = Tugas::all();

        return view('guru.tugas.show', compact('tugases', 'tugas_all'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tugas_all = Tugas::all();
        $tugases = Tugas::find($id);
        return view('guru.tugas.edit', compact('tugases', 'tugas_all'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tugases = Tugas::find($id);
        $tugases->nama = $request->nama;
        $tugases->deskripsi = $request->deskripsi;
        $tugases->tenggat_waktu = $request->tenggat_waktu;
        if ($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen');
            $extension = $dokumen->getClientOriginalName();
            $dokumenName = date('Ymd') . "." . $extension;
            $dokumen->move(storage_path('app/public/tugas/dokumen/'), $dokumenName);
            $tugases->dokumen = $dokumenName;
        }

        $jumlah_sub_tugas = count($request->input('sub_tugas'));

        for ($i = 0; $i < $jumlah_sub_tugas; $i++) {
            if (isset($request->input('id_sub')[$i])) {
                $subTugas = $tugases->subTugas->find($request->input('id_sub')[$i]);
                $subTugas->nama_sub_tugas = $request->input('sub_tugas')[$i];
                $subTugas->save();
            } else {
                $tugases->subTugas()->create([
                    'nama_sub_tugas' => $request->input('sub_tugas')[$i],
                    'tugas_id' => $tugases->id
                ]);
            }
        }

        // foreach ($request->input('sub_tugas') as $sub) {
        //     $found = false;

        //     // Periksa setiap subtugas yang sudah ada
        //     foreach ($tugases->subTugas as $subTugas) {
        //         if ($subTugas->nama_sub_tugas == $sub) {
        //             $found = true; // Setel kecocokan ditemukan menjadi true
        //             break; // Keluar dari loop karena kecocokan sudah ditemukan
        //         }
        //     }

        //     // Jika subtugas tidak ditemukan, buat subtugas baru
        //     if (!$found) {
        //         $tugases->subTugas()->create([
        //             'nama_sub_tugas' => $sub,
        //             'tugas_id' => $tugases->id
        //         ]);
        //     }
        // }
        $tugases->save();
        return redirect()->route('tugas-guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tugases = Tugas::find($id);
        $tugases->delete();

        return redirect()->route('tugas-guru.index');
    }

    public function nilai(string $id)
    {
        $tugases = Tugas::find($id);
        $result = TugasResult::where('tugas_id', $id)->get();

        // dd($result->first()->subTugas);

        return view('guru.tugas.nilai', compact('result', 'tugases'));
    }

    public function getTugasResult(string $id)
    {
        $result = TugasResult::find($id);
        $subTugas = $result->subTugas;
        $tugas = $result->tugas;
        $user = $result->user;

        return response()->json(
            [
                'result' => $result,
                'subTugas' => $subTugas,
                'tugas' => $tugas,
                'user' => $user
            ]
        );
    }
}

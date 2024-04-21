<?php

namespace App\Http\Controllers\Murid;

use App\Models\AbsenMurid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Absen;

class AbsenMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('murid.absen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'absen' => 'required',
        ]);
        // check absen untuk hari ini
        $absenMurid = Absen::where('tanggal_absen', date('Y-m-d'))->first();

        // check apakah absen telah lewat hari
        $absenLewat = Absen::where('tanggal_absen', '<', date('Y-m-d'))->first();

        // jika absen telah lewat hari
        if ($absenLewat) {
            return redirect()->back()->with('error', 'Maaf, Absen telah lewat!');
        } else if (!$absenMurid) {
            return redirect()->back()->with('error', 'Tidak ada absen untuk hari ini!');
        }

        // check apakah murid sudah absen
        $isAbsen = AbsenMurid::where('user_id', auth()->id())
            ->where('absen_id', $absenMurid->id)
            ->first();

        // jika sudah absen
        if ($isAbsen) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absen!');
        }

        // absen
        AbsenMurid::create([
            'user_id' => auth()->id(),
            'absen_id' => $absenMurid->id,
            'jam_absen' => date('H:i:s'),
            'nama' => $request->nama,
            'no_absen' => $request->absen,
        ]);

        return redirect()->back()->with('success', 'Absen berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

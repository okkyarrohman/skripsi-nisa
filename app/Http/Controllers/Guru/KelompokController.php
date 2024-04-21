<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelompoks = Kelompok::all();

        return view('guru.dataMurid.kelompok', compact('kelompoks'));
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
            'kuota' => 'required|integer',
        ]);

        Kelompok::create([
            'nama' => $request->input('nama'),
            'kuota' => $request->input('kuota'),
        ]);

        return redirect()->route('kelompok-guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kelompok = Kelompok::findOrFail($id);

        return response()->json($kelompok);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'kuota' => 'required|integer',
        ]);

        $kelompok = Kelompok::find($id);
        $kelompok->nama = $request->input('nama');
        $kelompok->kuota = $request->input('kuota');
        $kelompok->save();

        return redirect()->route('kelompok-guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelompok = Kelompok::find($id);
        $kelompok->delete();

        return redirect()->route('kelompok-guru.index');
    }
}

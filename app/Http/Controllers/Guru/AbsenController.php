<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murids = User::role('murid')->get();
        $absens = Absen::all();

        return view('guru.absen.index', compact('murids', 'absens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $murids = User::role('murid')->get();
        $absens = Absen::all();

        return view('guru.absen.create', compact('murids', 'absens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_absen' => 'required',
            'tanggal_absen' => 'required',
        ]);

        Absen::create([
            'nama_absen' => $request->nama_absen,
            'tanggal_absen' => $request->tanggal_absen,
        ]);

        return redirect()->route('absen-guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absen = Absen::find($id);
        $absens = Absen::all();

        return view('guru.absen.show', compact('absen', 'absens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absen = Absen::find($id);
        $absens = Absen::all();

        return view('guru.absen.edit', compact('absen', 'absens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_absen' => 'required',
            'tanggal_absen' => 'required',
        ]);

        Absen::find($id)->update([
            'nama_absen' => $request->nama_absen,
            'tanggal_absen' => $request->tanggal_absen,
        ]);

        return redirect()->route('absen-guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Absen::destroy($id);

        return redirect()->route('absen-guru.index');
    }

    public function detail(string $id)
    {
        $absen = Absen::find($id);

        // dd($absen->absenMurids);
        $absens = Absen::all();

        return view('guru.absen.detail', compact('absens', 'absen'));
    }
}

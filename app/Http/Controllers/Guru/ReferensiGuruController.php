<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referensi;

class ReferensiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referensis = Referensi::all();

        return view('guru.referensi.index', compact('referensis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.referensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $referensis = Referensi::create([
            'nama' => $request->input('nama'),
        ]);
        if ($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen');
            $extension = $dokumen->getClientOriginalName();
            $dokumenName = date('Ymd') . "." . $extension;
            $dokumen->move(storage_path('app/public/referensi/dokumen/'), $dokumenName);
            $referensis->dokumen = $dokumenName;
        }
        $referensis->save();

        return redirect()->route('referensi-guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $referensis = Referensi::find($id)->first();
        return view('guru.referensi.show', compact('referensis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $referensis = Referensi::find($id)->first();
        return view('guru.referensi.edit', compact('referensis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $referensis = Referensi::find($id)->first();
        if ($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen');
            $extension = $dokumen->getClientOriginalName();
            $dokumenName = date('Ymd') . "." . $extension;
            $dokumen->move(storage_path('app/public/referensi/dokumen/'), $dokumenName);
            $referensis->dokumen = $dokumenName;
        }
        $referensis->save();
        return redirect()->route('referensi-guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $referensis = Referensi::find($id)->first();
        $referensis->delete();
        return redirect()->route('referensi-guru.index');
    }
}

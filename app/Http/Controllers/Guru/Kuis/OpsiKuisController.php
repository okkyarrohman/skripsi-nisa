<?php

namespace App\Http\Controllers\Guru\Kuis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opsi;
use App\Models\Soal;

class OpsiKuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opsis = Opsi::all();

        return view('guru.kuis.opsi.index', compact('opsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $soals = Soal::all();

        return view('guru.kuis.opsi.create', compact('soals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Opsi::create([
            'soal_id' => $request->input('soal_id'),
            'opsi' => $request->input('opsi'),
            'point' => $request->input('point'),
        ]);


        return redirect()->route('opsi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $opsis = Opsi::find($id)->first();

        return view('guru.kuis.opsi.show', compact('opsis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $soals = Soal::all();
        $opsis = Opsi::find($id)->first();
        return view('guru.kuis.opsi.edit', compact('opsis', 'soals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $opsis = Opsi::find($id)->first();
        $opsis->opsi = $request->opsi;
        $opsis->point = $request->point;
        $opsis->save();

        return redirect()->route('opsi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $opsis = Opsi::find($id)->first();
        $opsis->delete();
        return redirect()->route('opsi.index');
    }
}

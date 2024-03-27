<?php

namespace App\Http\Controllers\Guru\Kuis;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use Illuminate\Http\Request;

class HasilKuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasils = Hasil::all();

        // dd($hasils[1]->kategori_kuis);
        return view('guru.kuis.hasil.index', compact('hasils'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $hasils = Hasil::find($id)->first();
        return view('guru.kuis.hasil.show', compact('hasils'));
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

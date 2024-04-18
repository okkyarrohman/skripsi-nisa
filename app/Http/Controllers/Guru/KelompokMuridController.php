<?php

namespace App\Http\Controllers\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelompokMurid;

class KelompokMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // dd($request->all());
        $kelompokMurid = new KelompokMurid();
        $kelompokMurid->kelompok_id = $request->id;
        $kelompokMurid->murid_id = auth()->user()->id;
        $kelompokMurid->save();

        return redirect()->route('tugas.index');
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

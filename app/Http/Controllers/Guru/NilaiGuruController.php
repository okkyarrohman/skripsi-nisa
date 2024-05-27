<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\TugasResult;
use Illuminate\Http\Request;

class NilaiGuruController extends Controller
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
        //
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
        // dd([
        //     $request->all(),
        //     'id' => $id,
        // ]);
        TugasResult::find($id)->update([
            'nilai' => $request->nilai
        ]);
        $tugas = TugasResult::find($id);

        return redirect()->back()->with('success', 'Nilai ' . $tugas->user->name . ' berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tugas = TugasResult::find($id);
        $tugas->delete();

        return redirect()->back();
    }
}

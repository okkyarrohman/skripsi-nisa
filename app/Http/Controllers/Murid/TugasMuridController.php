<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\TugasResult;
use Illuminate\Http\Request;

class TugasMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugases = Tugas::all();

        return view('murid.tugas.index', compact('tugases'));
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
        $tugases = new TugasResult();
        $tugases->tugas_id = $request->tugas_id;
        $tugases->user_id = auth()->user()->id;
        $tugases->answer = $request->answer;
        $tugases->save();

        return redirect()->route('tugas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugases = Tugas::find($id)->first();

        return view('murid.tugas.index', compact('tugases'));
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
        $tugases = TugasResult::find($id);
        $tugases->tugas_id = $request->tugas_id;
        $tugases->user_id = auth()->user()->id;
        $tugases->answer = $request->answer;
        $tugases->save();

        return redirect()->route('tugas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

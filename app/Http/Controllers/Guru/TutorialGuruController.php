<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutorials = Tutorial::all();
        return view('guru.tutorial.index', compact('tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.tutorial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tutorials = Tutorial::create([
            'nama' => $request->input('nama'),
            'link'  => $request->input('link'),
        ]);

        return redirect()->route('tutorial-guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tutorials = Tutorial::find($id)->first();

        return view('guru.tutorial.show', compact('tutorials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tutorials = Tutorial::find($id)->first();
        return view('guru.tutorial.edit', compact('tutorials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tutorials = Tutorial::find($id)->first();
        $tutorials->nama = $request->nama;
        $tutorials->link = $request->link;
        $tutorials->save();

        return redirect()->route('tutorial-guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tutorials = Tutorial::find($id)->first();
        $tutorials->delete();
        return redirect()->route('tutorial-guru.index');
    }
}

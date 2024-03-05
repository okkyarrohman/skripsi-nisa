<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;
use app\Repository\MateriRepository;

class MateriGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::all();

        return view('guru.materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materi_all = Materi::all();

        return view('guru.materi.create', compact('materi_all'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, MateriRepository $repository)
    {
        $materi =  $repository->store($request->only([
            'nama',
            'deskripsi',
        ]));
        $this->handleFileUpload($request, $materi, 'dokumen');

        return redirect()->route('materi-guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materi_all = Materi::all();
        $materis = Materi::find($id);

        return view('guru.materi.show', compact('materis', 'materi_all'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materis = Materi::find($id)->first();

        return view('guru.materi.edit', compact('materis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi, MateriRepository $repository)
    {
        $materi = $repository->update($materi, $request->only([
            'nama',
            'deskripsi',
            'dokumen' => $this->handleFileUpload($request, $materi, 'dokumen'),
        ]));


        return redirect()->route('materi-guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materis = Materi::find($id)->first();

        $materis->delete();
        return redirect()->route('materi-guru.index');
    }

    private function handleFileUpload(Request $request, Materi $materi, $columnName)
    {
        if ($request->hasFile($columnName)) {
            $file = $request->file($columnName);
            $extension = $file->getClientOriginalExtension();
            $fileName = date('YmdHi') . '.' . $materi->nama . '.' . $extension;
            $file->storeAs('public/Materi/' . $columnName, $fileName);
            $materi->$columnName = $fileName;
            $materi->save();
        }
    }
}

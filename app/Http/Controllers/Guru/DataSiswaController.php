<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kelompok;
use App\Models\SubTugas;
use App\Models\Tugas;
use App\Models\TugasResult;
use Illuminate\Http\Request;
use App\Models\User;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murids = User::role('murid')->get();

        return view('guru.dataMurid.index', compact('murids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.dataMurid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $murid = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $murid->assignRole('murid');

        return redirect()->route('data-murid.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $murids = User::role('murid')->get();
        $murid = User::findOrFail($id); // Menggunakan findOrFail agar melempar 404 jika tidak ditemukan

        $kelompok_id = $murid->kelompokMurid->kelompok->id;


        $tugases = Tugas::where('kelompok_id', $kelompok_id)->get();


        $totalSubtugas = []; // Menggunakan array untuk menyimpan total subtugas per tugas
        $totalTugasAnswer = []; // Menggunakan array untuk menyimpan total jawaban tugas per tugas

        foreach ($tugases as $tugas) {
            $totalSubtugas[$tugas->id] = SubTugas::where('tugas_id', $tugas->id)->count();

            $totalTugasAnswer[$tugas->id] = TugasResult::where('tugas_id', $tugas->id)
                ->where('user_id', $id)
                ->count();
        }

        return view('guru.dataMurid.show', compact('murids', 'murid', 'tugases', 'totalSubtugas', 'totalTugasAnswer'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $murids = User::find($id);
        return view('guru.dataMurid.edit', compact('murids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $murids = User::find($id);
        $murids->name = $request->name;
        $murids->email = $request->email;
        $murids->name = bcrypt($request->password);
        $murids->save();

        return redirect()->route('data-murid.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $murids = User::find($id);
        $murids->delete();

        return redirect()->route('data-murid.index');
    }

    public function kelompok()
    {
        // $murids = User::role('murid')->get();
        $kelompoks = Kelompok::all();

        return view('guru.dataMurid.kelompok', compact('kelompoks'));
    }
}

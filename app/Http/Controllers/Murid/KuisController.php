<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\KategoriKuis;
use App\Models\Hasil;
use App\Models\Opsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kuises = KategoriKuis::all();
        return view('murid.kuis.index', compact('kuises'));
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
        $opsi = Opsi::find(array_values($request->input('soal')));

        $hasilSeluruh = new Hasil();
        $hasilSeluruh->user_id = Auth::user()->id;
        $hasilSeluruh->kategori_kuis_id = $request->kategori_kuis_id;
        $hasilSeluruh->total_points = $opsi->sum('point');
        $hasilSeluruh->save();

        $soal = $opsi->mapWithKeys(function ($option) {
            return [
                $option->soal_id => [
                    'opsi_id' => $option->id,
                    'point' => $option->point
                ],
            ];
        })->toArray();

        $hasilSeluruh->soal()->sync($soal);

        return redirect()->route('kuis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($result_id)
    {
        // $result = Hasil::whereHas('user', function ($query) {
        //     $query->whereId(auth()->id());
        // })->find($result_id);

        $result = Hasil::where('kategori_kuis_id', $result_id)->where('user_id', auth()->id())->first();

        // dd($result);

        // dd($result->soal->last()->pivot);

        // if there is no result, return to index
        // if (!$result) {
        //     // result = null
        //     $result = null;
        // }

        return view('murid.kuis.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = KategoriKuis::where('id', $id)->with(['soal' => function ($query) {
            $query->inRandomOrder()
                ->with(['opsi' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('soal')
            ->get();
        $kategori = KategoriKuis::find($id);
        $kuises = KategoriKuis::all();
        $is_pass_deadline = $kategori->tenggat_waktu < now();

        return view('murid.kuis.edit', compact('categories', 'kategori', 'is_pass_deadline', 'kuises'));
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

    public function mulai($id)
    {
        $categories = KategoriKuis::where('id', $id)->with(['soal' => function ($query) {
            $query->inRandomOrder()
                ->with(['opsi' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('soal')
            ->get();
        $kategori = KategoriKuis::find($id);
        return view('murid.kuis.mulai', compact('kategori', 'categories'));
    }
}

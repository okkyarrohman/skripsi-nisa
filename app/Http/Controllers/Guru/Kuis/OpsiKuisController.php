<?php

namespace App\Http\Controllers\Guru\Kuis;

use App\Http\Controllers\Controller;
use App\Models\KategoriKuis;
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
        $kategoris = KategoriKuis::all();

        return view('guru.kuis.opsi.index', compact('opsis', 'kategoris'));
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
        // Opsi::create([
        //     'soal_id' => $request->input('soal_id'),
        //     'opsi' => $request->input('opsi'),
        //     'point' => $request->input('point'),
        // ]);


        // return redirect()->route('opsi.index');

        // Mendapatkan data dari form
        $soalIds = $request->input('soal_id');
        $opsis = $request->input('opsi');
        $points = $request->input('point');

        // Memproses data dan menyimpannya ke dalam database
        for ($i = 0; $i < count($soalIds); $i++) {
            // Membuat array untuk menyimpan data opsi
            $data = [];

            // Mendapatkan range indeks untuk soal saat ini
            $start = $i * 5;
            $end = min(($i + 1) * 5, count($opsis));

            // Looping untuk menyimpan data opsi sesuai dengan range indeks
            for ($j = $start; $j < $end; $j++) {
                // Mengecek apakah ada opsi_id yang dikirimkan
                if (isset($request->opsi_id[$j])) {
                    // Jika ada, lakukan operasi update
                    $opsi = Opsi::findOrFail($request->opsi_id[$j]);
                    $opsi->update([
                        'soal_id' => $soalIds[$i],
                        'opsi' => $opsis[$j],
                        'point' => $points[$j],
                    ]);
                } else {
                    // Jika tidak, lakukan operasi create
                    if ($opsis[$j] !== null && $points[$j] !== null) {
                        $data[] = [
                            'soal_id' => $soalIds[$i],
                            'opsi' => $opsis[$j],
                            'point' => $points[$j],
                        ];
                    }
                }
            }

            // Menyimpan data opsi baru ke dalam database
            if (!empty($data)) {
                Opsi::insert($data);
            }
        }


        // Redirect ke halaman index atau halaman lain
        return redirect()->route('opsi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $soals = Soal::where('kategori_kuis_id', $id)->with('opsi')->get();
        $opsis = Opsi::find($id);
        $kategoris = KategoriKuis::all();

        return view('guru.kuis.opsi.show', compact('opsis', 'soals', 'kategoris', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $soals = Soal::where('kategori_kuis_id', $id)->with('opsi')->get();
        $opsis = Opsi::find($id);
        $kategoris = KategoriKuis::all();

        return view('guru.kuis.opsi.edit', compact('opsis', 'soals', 'kategoris', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $opsis = Opsi::find($id);
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
        $opsis = Opsi::find($id);
        $opsis->delete();
        return redirect()->route('opsi.index');
    }
}

<?php


namespace app\Repository;

use App\Models\Materi;
use Illuminate\Http\Request;


class MateriRepository extends Repositories
{
    public function __construct()
    {
    }


    public function store(array $attributes)
    {

        return
            Materi::create([
                'nama' => data_get($attributes, 'nama'),
                'deskripsi' => data_get($attributes, 'deskripsi'),
            ]);
    }

    public function update(Materi $materi, array $attributes)
    {
        return
            $materi->update([
                'nama' => data_get($attributes, 'nama', $materi->nama),
                'deskripsi' => data_get($attributes, 'deskripsi', $materi->deskripsi),
                'dokumen' => data_get($attributes, 'dokumen', $materi->dokumen),
            ]);
    }

    public function forceDelete()
    {
    }
}

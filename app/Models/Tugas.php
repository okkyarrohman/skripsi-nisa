<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = [
        'nama',
        'deskripsi',
        'dokumen',
        'kelompok_id',
        'tenggat_waktu',
    ];

    public function tugasResult()
    {
        return $this->hasMany(TugasResult::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

    public function subTugas()
    {
        return $this->hasMany(SubTugas::class);
    }
}

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
        'dokumen'
    ];

    public function tugasResult()
    {
        return $this->hasMany(TugasResult::class);
    }
}

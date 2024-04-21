<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasResult extends Model
{
    use HasFactory;

    protected $table = 'tugas_results';

    protected $fillable = [
        'user_id',
        'tugas_id',
        'sub_tugas_id',
        'name',
        'no_absen',
        'answer',
        'deskripsi',
        'nilai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    public function subTugas()
    {
        return $this->belongsTo(SubTugas::class);
    }
}

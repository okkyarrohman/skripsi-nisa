<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenMurid extends Model
{
    use HasFactory;

    protected $table = 'absen_murids';

    protected $fillable = [
        'nama',
        'no_absen',
        'user_id',
        'absen_id',
        'jam_absen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absen()
    {
        return $this->belongsTo(Absen::class);
    }
}

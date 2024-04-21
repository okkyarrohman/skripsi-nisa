<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absens';

    protected $fillable = [
        'nama_absen',
        'tanggal_absen',
    ];

    public function murids()
    {
        return $this->belongsToMany(
            User::class,
            'absen_murids',
            'absen_id',
            'user_id'
        );
    }

    public function absenMurids()
    {
        return $this->hasMany(AbsenMurid::class);
    }
}

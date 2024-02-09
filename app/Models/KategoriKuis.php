<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKuis extends Model
{
    use HasFactory;

    protected $table = 'kategori_kuis';

    protected $fillable = ['kuis', 'tenggat', 'waktu'];

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }
}

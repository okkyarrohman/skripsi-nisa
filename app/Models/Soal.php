<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soals';
    protected $fillable = ['kategori_kuis_id', 'soal', 'gambar'];

    public function kategori()
    {
        return $this->belongsTo(KategoriKuis::class, 'kategori_kuis_id');
    }

    public function opsi()
    {
        return $this->hasMany(Opsi::class);
    }
}

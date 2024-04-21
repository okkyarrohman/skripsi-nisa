<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['kategori_kuis_id', 'total_points'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soal()
    {
        // return $this->belongsToMany(Soal::class)->withPivot(['opsi_id', 'point']);
        return $this->belongsToMany(Soal::class)->with(['kategori', 'opsi'])->withPivot(['opsi_id', 'point']);
    }

    public function kategori_kuis()
    {
        return $this->belongsTo(KategoriKuis::class);
    }
}

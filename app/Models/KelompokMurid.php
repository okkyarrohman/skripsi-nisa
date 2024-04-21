<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokMurid extends Model
{
    use HasFactory;

    protected $table = 'kelompok_murids';

    protected $fillable = ['kelompok_id', 'murid_id'];

    public function murid()
    {
        return $this->belongsTo(User::class, 'id', 'murid_id');
    }
}

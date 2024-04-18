<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kelompok extends Model
{
    use HasFactory;

    protected $table = 'kelompoks';

    protected $fillable = ['nama', 'kuota'];

    public function murids()
    {
        return $this->belongsToMany(
        User::class,
            'kelompok_murids',
            'kelompok_id',
            'murid_id'
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTugas extends Model
{
    use HasFactory;

    protected $table = 'sub_tugas';

    protected $fillable = [
        'nama_sub_tugas',
        'tugas_id'
    ];
}

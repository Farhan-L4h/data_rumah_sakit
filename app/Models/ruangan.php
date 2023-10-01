<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'nama_ruangan',
        'jenis_ruangan',
        'kapasitas' 

    ];

    public function antrian() {
        return $this->hasMany(antrian::class);
        }
}



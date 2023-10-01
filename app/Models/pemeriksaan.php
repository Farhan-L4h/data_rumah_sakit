<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
            'keluhan',
            'tanggal',
            'id_pasien',
            'id_dokter'

    ];

    

    public function pasien() {
        return $this->belongsTo(pasien::class, 'id_pasien','id');
        }

        public function dokter() {
            return $this->belongsTo(dokter::class, 'id_dokter','id');
            }

            public function antrian() {
                return $this->hasMany(antrian::class);
                }

                public function resep() {
                    return $this->hasMany(resepsionis::class);
                    }
            
}

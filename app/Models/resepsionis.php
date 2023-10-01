<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resepsionis extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'id_pasien',
        'id_dokter',
        'id_periksa'

    ];

    public function antrian() {
        return $this->hasMany(antrian::class);
        }

        public function dokter() {
            return $this->belongsTo(dokter::class, 'id_dokter','id');
            }

            public function pasien() {
                return $this->belongsTo(pasien::class, 'id_pasien','id');
                }

                public function periksa() {
                    return $this->belongsTo(pemeriksaan::class, 'id_periksa','id');
                    }

}

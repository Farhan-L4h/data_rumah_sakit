<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nama_pasien',
        'umur',
        'jenis_kelamin',
        'alamat',
        'no_tlpn',
        'tanggal_lahir',
        'id_dokter'

    ];

        public function dokter() {
            return $this->belongsTo(dokter::class, 'id_dokter','id');
            }
                    
            public function pemeriksa() {
                return $this->hasMany(pemeriksaan::class);
                }

                public function antrian() {
                    return $this->hasMany(antrian::class);
                    }
}

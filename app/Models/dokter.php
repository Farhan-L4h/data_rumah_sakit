<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nama_dokter',
        'bidang',
        'alamat',
        'umur',
        'jenis_kelamin',
        'no_tlpn'
    ];

    public function pasien() {
        return $this->hasMany(pasien::class);
        }

        public function periksa() {
            return $this->hasMany(pemeriksaan::class);
            }

            public function antrian() {
                return $this->hasMany(antrian::class);
                }
}

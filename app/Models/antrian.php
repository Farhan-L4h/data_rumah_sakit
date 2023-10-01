<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antrian extends Model
{
    protected $fillable =
    [
            'tanggal',
            'id_pasien',
            'id_dokter',
            'id_resep',
            'id_ruangan',
            'id_periksa'

            
    ];

    public function dokter() {
        return $this->belongsTo(dokter::class, 'id_dokter');
        }

        public function pasien() {
            return $this->belongsTo(pasien::class, 'id_pasien');
            }

        public function resep() {
            return $this->belongsTo(resepsionis::class, 'id_resep');
            }

        public function ruangan() {
            return $this->belongsTo(ruangan::class, 'id_ruangan');
            }

        public function periksa() {
            return $this->belongsTo(pemeriksaan::class, 'id_periksa');
            }
    }
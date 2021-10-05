<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',

        /* ---------------------------------------------------
            KECEKAPAN TERAS
        ----------------------------------------------------- */

        'status_teras',
        'kecekapan_teras',
        
        // 'skor_pekerja',
        // 'skor_penyelia',

        'kepimpinan_penyelia',
        'kepimpinan',

        'keupayaan_penyelia',
        'inovatif',

        'pengurusan_penyelia',
        'pengurusan',

        'berkepentingan_penyelia',
        'berkepentingan',

        'ketangkasan_penyelia',
        'ketangkasan', 
        
        /* ---------------------------------------------------
            NILAI TERAS
        ----------------------------------------------------- */

        'status_nilai',
        'nilai_teras',

        // 'skor_pekerja',
        // 'skor_penyelia',

        'kepimpinan_nilai_penyelia',
        'skor_kepimpinan_nilai',

        'perkembangan_penyelia',
        'skor_perkembangan',

        'keputusan_penyelia',
        'skor_keputusan',

        'sumbangan_penyelia',
        'skor_sumbangan',

        'rohani_penyelia',
        'skor_rohani', 
        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_ extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [

        'nilai_teras',
        'jangkaan_hasil',
        'peratus',
        'ukuran',
        'skor_pekerja',
        'skor_penyelia',
        'skor_sebenar',

        'grade',
        'total_score',
        'weightage',
         
        'user_id',
        // 'tahun',
        // 'bulan',
    ];
}
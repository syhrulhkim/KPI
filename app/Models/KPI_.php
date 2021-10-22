<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPI_ extends Model
{
    use HasFactory;

    protected $table = 'kpi';

    protected $fillable = [

        'fungsi',
        'objektif',
        'bukti',
        'link',
        'peratus',
        'ukuran',
        'threshold',
        'base',
        'stretch',
        'pencapaian',
        'skor_KPI', 
        'skor_sebenar',

        'grade',
        'total_score',
        'weightage',
         
        'user_id',
        'tahun',
        'bulan',
    ];

    // public function buktia() {
    //     return $this->hasOne('App\Models\bukti', 'kpi_id', 'id');
    // }
}
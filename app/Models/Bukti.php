<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    protected $table = 'bukti';

    protected $fillable = [

        'fungsi',
        'objektif',
        'bukti',
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
        'link',
    ];

    public function kpia() {
        return $this->hasOne('App\Models\KPI_', 'id', 'kpi_id');
    }

}

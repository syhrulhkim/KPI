<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Displaykpi_ extends Model
{
    use HasFactory;
    protected $table = 'kpi';
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
        'year',
        'month',
    ];
}
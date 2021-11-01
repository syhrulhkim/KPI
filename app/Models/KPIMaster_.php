<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPIMaster_ extends Model
{
    use HasFactory;

    protected $table = 'kpi_master';

    protected $fillable = [

        'fungsi',
        'percent_master',
        'link',
        'objektif',
        'pencapaian',
        'skor_KPI', 
        'skor_sebenar',
         
        'user_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPIAll_ extends Model
{
    use HasFactory;

    protected $table = 'kpi_all';
    // public $incrementing = false;

    protected $fillable = [

        'grade_master',
        'weightage_master',
        'total_score_master',

        'grade_all',
        'weightage_all',
        'total_score_all',
        
        'user_id',
    ];
        public function kpimasters() {
        return $this->hasMany('App\Models\KPIMaster_', 'kpiall_id', 'id');
    }
}

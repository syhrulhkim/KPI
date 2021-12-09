<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date_ extends Model
{
    use HasFactory;
    protected $table = 'date';
    protected $fillable = [
        'year',
        'month',
        'user_id',
        'status',
    ];
    //     public function kpimasters() {
    //     return $this->hasOne('App\Models\KPIMaster_', 'id', 'kpimaster_id');
    // }
}
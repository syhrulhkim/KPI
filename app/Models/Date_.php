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
        'message_manager',
        'message_hr',
        'manager_id',
        'hr_id',
    ];
}
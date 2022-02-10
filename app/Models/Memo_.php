<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo_ extends Model
{
    use HasFactory;
    protected $table = 'memo';
    protected $fillable = [
        'title',
        'memo_path',
        'user_id',
    ];
}
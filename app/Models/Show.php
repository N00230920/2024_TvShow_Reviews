<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'overview',
        'where_to_watch',
        'number_of_episodes',
        'air_date',
        'end_date',
        'image',
        'created_at',
        'updated_at',
    ];
}

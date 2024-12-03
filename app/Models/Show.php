<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

     // Specifies the attributes that can be mass-assigned
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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //Show can have many cast members
    public function showcasts()
    {
        return $this->belongsToMany(Cast::class);
    }
}

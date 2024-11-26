<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'character'];

    //Cast can have many shows
    public function shows()
    {
        return $this->belongsToMany(Show::class);
    }
}

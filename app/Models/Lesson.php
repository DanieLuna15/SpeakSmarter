<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function categories() { return $this->belongsToMany(Categories::class); } // belongsToMany()

    public function level() { return $this->belongsTo(Level::class); }
}


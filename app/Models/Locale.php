<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use HasFactory;
    protected  $fillable = ["locale","name","description","short_description","meta_description","meta_keywords"];
}

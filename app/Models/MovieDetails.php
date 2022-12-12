<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDetails extends Model
{
    use HasFactory;
    public $table='movie_details';
    public $timestamps = false;
}

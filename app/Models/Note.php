<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //Para que laravel permita guardar datos en estos campos.
    protected $fillable = ['title', 'content'];
}

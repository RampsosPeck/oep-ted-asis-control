<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'nombre','fecha','ingresom','salidam','ingresot','salidat'
    ];

    protected $dates = [
        'fecha'
    ];
}

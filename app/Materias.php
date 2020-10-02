<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Materias extends MongoModel
{
    protected $fillable = [
        'nombreMateria', 'nivel', 'descripcion','estado'
    ];
}

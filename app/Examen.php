<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Examen extends MongoModel
{
    protected $fillable = [
        'user',
        'name',
        'inicio',
        'tiempo',
        'materia',
        'items',
        'estado',
    ];
}
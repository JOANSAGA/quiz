<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Preguntas extends MongoModel
{
    protected $fillable = [
        'pregunta',
        'materia',
        'litA',
        'litB',
        'litC',
        'litD',
        'litCorrecto',
        'estado',
    ];
}

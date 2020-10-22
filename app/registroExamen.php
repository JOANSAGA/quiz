<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class registroExamen extends MongoModel
{
    protected $fillable = [
        'idEsrudiante',
        'respuestas',
        'idexamen',
    ];
}
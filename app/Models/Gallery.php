<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;

class Gallery extends Authenticatable
{
    protected $connection = 'mongodb';
    protected $collection = 'galleries';

    protected $fillable = [
        'name',
        'defaultPath',
        'hoverPath',
    ];
}

<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;

class Destination extends Authenticatable
{
    protected $connection = 'mongodb';
    protected $collection = 'destinations'; 

    protected $fillable = [
        'destinationTitle',
        'description',
        'imagePath',
    ];
}

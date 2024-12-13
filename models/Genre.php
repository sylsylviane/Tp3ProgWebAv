<?php

namespace App\Models;

use App\Models\CRUD;

class Genre extends CRUD
{
    protected $table = 'genre';
    protected $primaryKey = 'id';
    protected $fillable = ['genre_id'];
}

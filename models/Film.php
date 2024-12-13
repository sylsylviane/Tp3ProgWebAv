<?php

namespace App\Models;

use App\Models\CRUD;

class Film extends CRUD
{
    protected $table = 'film';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'synopsis', 'date_sortie', 'duree', 'genre_id'];
}

<?php

namespace App\Models;

use App\Models\CRUD;

class Realisateur extends CRUD
{
    protected $table = 'realisateur';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'pays_origine', 'date_naissance'];
}

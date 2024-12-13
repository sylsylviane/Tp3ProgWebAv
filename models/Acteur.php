<?php

namespace App\Models;

use App\Models\CRUD;

class Acteur extends CRUD
{
    protected $table = 'acteur';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'pays_origine', 'date_naissance'];
}

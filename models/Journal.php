<?php

namespace App\Models;
use App\Models\CRUD;

class Journal extends CRUD{
    protected $table = 'journal_de_bord';
    protected $primaryKey = 'id';
    protected $fillable = ['adresse_ip', 'nom_utilisateur', 'page_visitee'];
}
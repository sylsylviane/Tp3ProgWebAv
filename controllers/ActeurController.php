<?php

namespace App\Controllers;

use App\Models\Acteur;
use App\Providers\View;

class ActeurController
{
    public function index()
    {
        $acteur = new Acteur;
        $acteurs = $acteur->select('nom');

        if ($acteurs) {
            return View::render('acteur/index', ['acteurs' => $acteurs]);
        } else {
            return View::render('error');
        }
    }
}

<?php

namespace App\Controllers;

use App\Providers\View;
use App\Models\Realisateur;

class RealisateurController
{
    public function index()
    {
        $realisateur = new Realisateur;
        $realisateurs = $realisateur->select('nom');
        if ($realisateurs) {
            return View::render('realisateur/index', ['realisateurs' => $realisateurs]);
        } else {
            return View::render('error');
        }
    }
}

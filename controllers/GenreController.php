<?php

namespace App\Controllers;

use App\Models\Genre;
use App\Providers\View;

class GenreController
{
    public function index()
    {
        $genre = new Genre;
        $genres = $genre->select('nom');
        if ($genres) {
            return View::render('genre/index', ['genres' => $genres]);
        } else {
            return View::render('error');
        }
    }
}

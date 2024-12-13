<?php

namespace App\Controllers;

use App\Models\Film;
use App\Providers\View;
use App\Models\Genre;
use App\Providers\Validator;

class FilmController
{
    public function indexHome()
    {
        $film = new Film;
        $films = $film->getFiveNewest('titre');
        $genre = new Genre;
        $genres = $genre->select('nom');
        if ($films) {
            return View::render('home', ['films' => $films, 'genres' => $genres]);
        } else {
            return View::render('error');
        }
    }
    public function index()
    {
        $film = new Film;
        $films = $film->select('titre');
        $genre = new Genre;
        $genres = $genre->select('nom');
        if ($films) {
            return View::render('film/index', ['films' => $films, 'genres' => $genres]);
        } else {
            return View::render('error');
        }
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $film = new Film;
            $films = $film->selectId($data['id']);
            $genre = new Genre;
            $genres = $genre->select('nom');
            if ($films) {
                return View::render('film/show', ['film' => $films, 'genres' => $genres]);
            } else {
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function create()
    {
        $genre = new Genre;
        $genres = $genre->select('nom');
        View::render('film/create', ['genres' => $genres]);
    }

    public function store($data)
    {
        $validator = new Validator;
        $validator->field('titre', $data['titre'])->min(2)->max(100);
        $validator->field('synopsis', $data['synopsis']);
        $validator->field('date_sortie', $data['date_sortie'], 'Date de sortie')->validateDate($format = 'Y-m-d');
        $validator->field('duree', $data['duree'])->max(20);
        $validator->field('genre_id', $data['genre_id'], 'Genre')->required();

        if ($validator->isSuccess()) {

            $film = new Film;
            $insert = $film->insert($data);
            if ($insert) {
                return View::redirect('film');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            $genre = new Genre;
            $genres = $genre->select('nom');

            return View::render('film/create', ['errors' => $errors, 'inputs' => $data, 'genres' => $genres]);
        }
    }

    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $film = new Film;
            $films = $film->selectId($data['id']);

            if ($films) {
                $genre = new Genre;
                $genres = $genre->select('nom');
                return View::render('film/edit', ['genres' => $genres, 'inputs' => $films]);
            } else {
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function update($data = [], $get = [])
    {
        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('titre', $data['titre'], 'Le titre')->min(2)->max(100);
            $validator->field('synopsis', $data['synopsis']);
            $validator->field('date_sortie', $data['date_sortie'], 'Date de sortie')->validateDate($format = 'Y-m-d');
            $validator->field('duree', $data['duree'])->max(20);
            $validator->field('genre_id', $data['genre_id'], 'Genre')->required();

            if ($validator->isSuccess()) {
                $film = new Film;
                $update = $film->update($data, $get['id']);
                if ($update) {
                    return View::redirect('film/show?id=' . $get['id']);
                } else {
                    return View::render('error');
                }
            } else {
                $genre = new Genre;
                $genres = $genre->select('nom');
                $errors = $validator->getErrors();
                $inputs = $data;
                return View::render('film/edit', ['errors' => $errors, 'inputs' => $inputs, 'genres' => $genres]);
            }
        }
        return View::render('error');
    }

    public function delete($data)
    {
        $film = new Film;
        $delete = $film->delete($data['id']);

        if ($delete) {
            return View::redirect('film');
        }
        return View::render('error');
    }
}

<?php

namespace App\Controllers;

use App\Models\User;
use App\Providers\View;
use App\Providers\Validator;

class AuthController
{

    public function index()
    {
        return View::render('login');
    }

    public function store($data)
    {
        $validator = new Validator;
        $validator->field('username', $data['username'])->min(2)->max(50);
        $validator->field('password', $data['password'])->min(6)->max(20);

        if ($validator->isSuccess()) {
            $user = new User;
            $checkuser = $user->checkuser($data['username'], $data['password']);

            if ($checkuser) {
                return View::redirect('film');
            } else {
                $errors['message'] = "Informations non valide";
                return View::render('login', ['errors' => $errors, 'inputs' => $data]);
            }
        } else {


            $errors = $validator->getErrors();
            return View::render('login', ['errors' => $errors, 'inputs' => $data]);
        }
    }

    public function delete()
    {
        session_destroy();
        return View::redirect('login');
    }
}

<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController
{

    public function __construct()
    {
        Auth::session();
        Auth::privilege(1);
    }

    public function create()
    {
        $privilege = new Privilege;
        $privileges = $privilege->select();
        return View::render('user/create', ['privileges' => $privileges]);
    }

    public function store($data)
    {
        $validator = new Validator;
        $validator->field('name', $data['name'], 'Le nom')->min(2)->max(50);
        $validator->field('username', $data['username'], 'Le nom d\'utilisateur')->min(2)->max(50)->unique('User');
        $validator->field('password', $data['password'], 'Le mot de passe')->min(6)->max(20);
        $validator->field('privilege_id', $data['privilege_id'], "Le privilege")->required()->number();

        if ($validator->isSuccess()) {
            $user = new User;
            $data['email'] = $data['username'];
            $data['password'] = $user->hashPassword($data['password']);
            $insert  = $user->insert($data);
            if ($insert) {
                return View::redirect('login');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $privileges = $privilege->select();
            return View::render('user/create', ['errors' => $errors, 'inputs' => $data, 'privileges' => $privileges]);
        }
    }
}

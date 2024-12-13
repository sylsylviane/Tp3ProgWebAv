<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;

class UserController{
    /**
     *  Récupère les données de privilèges de la base de données et retourne le modèle de view user/create
     */
    public function create(){
        $privilege = new Privilege;
        $privileges = $privilege->select('privilege');
        return View::render('user/create', ['privileges'=>$privileges]);
    }
    
    /**
     * Valide les donneés saisies par l'utilisateur et les insère dans la base de données si la validation est réussit. Sinon, gère les erreurs. 
     */
    public function store($data = []){
        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(50);
         $validator->field('username', $data['username'])->unique('User')->email()->min(2)->max(50);
        $validator->field('password', $data['password'])->min(6)->max(20);
        $validator->field('email', $data['email'])->required()->email()->max(100);
        $validator->field('privile_id', $data['privilege_id'])->required()->int();

        if ($validator->isSuccess()){
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($data);

            if($insert){
                return View::redirect('login');
            }else{
                return View::render('error');
            }
        }else{
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $privileges = $privilege->select('privilege');
            return View::render('user/create', ['errors'=>$errors, 'user'=>$data, 'privileges'=>$privileges]);
        }
    }
}


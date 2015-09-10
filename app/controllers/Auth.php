<?php

namespace app\controllers;

use app\components\App;
use app\models\UsersModel;

class Auth {

    public function register() {

        $postData = App::create()->request->post();
        if ($postData) {
            var_dump((new UsersModel())->fromArray($postData));exit;


        } else {
            App::create()->template
                ->setData([
                    'title' => 'Registration'
                ])
                ->render('auth/register');
        }
    }

    public function login() {
    }

    public function logout() {
    }
}
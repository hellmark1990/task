<?php

namespace app\controllers;

use app\components\App;

class Auth {

    public function register() {

        $postData = App::create()->request->post();
        if ($postData) {

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
<?php

namespace app\controllers;

use app\components\App;
use app\models\UsersModel;

class Auth {

    public function register() {
        $postData = App::create()->request->post();
        if ($postData) {
            $user = new UsersModel();
            $validation = $user->fromArray($postData)->validate('register');
            $validationErrors = $validation->getErrors();

            if (!$validationErrors) {
                $user->setPassword(md5($user->getPassword()));
                $user->save();

                header('Location: /login');
            }
        }

        App::create()->template
            ->setData([
                'title' => 'Registration',
                'validationErrors' => $validationErrors ? $validationErrors : [],
                'postData' => App::create()->request->post(),
            ])
            ->render('auth/register');

    }

    public function login() {
        $postData = App::create()->request->post();
        if ($postData) {
            $user = new UsersModel();
            $validation = $user->fromArray($postData)->validate('login');
            $validationErrors = $validation->getErrors();

            if (!$validationErrors) {
                $email = $postData['email'];
                $password = md5($postData['password']);
                $user = $user->findOne(['email' => "='$email'", 'AND', 'password' => "='$password'"]);

                if ($user) {
                    App::create()->session->setData(['userId' => $user->getId()]);
                    header('Location: /profile');
                }
            }
        }

        App::create()->template
            ->setData([
                'title' => 'Login',
                'validationErrors' => $validationErrors ? $validationErrors : [],
                'postData' => App::create()->request->post(),
            ])
            ->render('auth/login');
    }

    public function logout() {
        App::create()->session->destroySession();
        header('Location: /register');
    }
}
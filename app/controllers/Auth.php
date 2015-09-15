<?php

namespace app\controllers;

use app\components\App;
use app\models\UsersModel;

class Auth extends Controller{

    public function register() {
        if (App::create()->session->isLoggedIn()) {
            header('Location: /profile');
        }

        $postData = App::create()->request->post();
        if ($postData) {
            $userEmail = App::create()->request->post('email');
            $userInDb = (new UsersModel())->findOne(['email' => "='$userEmail'"]);

            if (!$userInDb->getId()) {
                $user = new UsersModel();
                $validation = $user->fromArray($postData)->validate('register');
                $validationErrors = $validation->getErrors();

                if (!$validationErrors) {
                    $user->setPassword(md5($user->getPassword()));
                    $user->save();

                    header('Location: /login');
                }
            } else {
                $validationErrors[]['email']['message'] = 'User with such email is already exists.';
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
        if (App::create()->session->isLoggedIn()) {
            header('Location: /profile');
        }

        $postData = App::create()->request->post();
        if ($postData) {
            $user = new UsersModel();
            $validation = $user->fromArray($postData)->validate('login');
            $validationErrors = $validation->getErrors();

            if (!$validationErrors) {
                $email = $postData['email'];
                $password = md5($postData['password']);
                $user = $user->findOne(['email' => "='$email'", 'AND', 'password' => "='$password'"]);

                if ($user->getId()) {
                    App::create()->session->setData(['userId' => $user->getId()]);
                    header('Location: /profile');
                }else{
                    $validationErrors[]['user']['message'] =  'Your entered data for login are wrong';
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
        header('Location: /login');
    }
}
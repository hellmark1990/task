<?php

namespace app\controllers;

use app\components\App;
use app\models\UsersModel;

class Profile extends Controller{

    public function index() {
        $currentUserId = App::create()->session->getItem('userId');
        $user = (new UsersModel())->findOne(['id' => "=$currentUserId"]);

        if ($user->getId()) {
            App::create()->template
                ->setData([
                    'title' => 'User Profile',
                    'user' => $user,
                ])
                ->render('profile/index');
        } else {
            header('Location: /login');
        }

    }


}
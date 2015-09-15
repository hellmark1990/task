<?php

namespace app\controllers;
use app\components\App;


class Home extends Controller {

    public function index() {
        App::create()->template
            ->setData([
                'title' => 'Home Page',
            ])
            ->render('home/index');
    }
}
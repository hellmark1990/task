<?php

use app\components\Router;


Router::setRoute(['' => 'app\controllers\Home:index']);
Router::setRoute(['register' => 'app\controllers\Auth:register']);
Router::setRoute(['login' => 'app\controllers\Auth:login']);
Router::setRoute(['logout' => 'app\controllers\Auth:logout']);
Router::setRoute(['profile' => 'app\controllers\Profile:index']);
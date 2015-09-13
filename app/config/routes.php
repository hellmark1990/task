<?php

use app\components\Router;


Router::setRoute(['register' => 'app\controllers\Auth:register']);

Router::setRoute(['login' => 'app\controllers\Auth:login']);
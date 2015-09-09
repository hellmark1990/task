<?php

use app\components\ComponentsContainer;

ComponentsContainer::create()
    ->setComponent(['uri' => 'app\components\URI'])
    ->setComponent(['request' => 'app\components\Request'])
    ->setComponent(['template' => 'app\components\Template'])
    ->setComponent(['router' => 'app\components\Router']);
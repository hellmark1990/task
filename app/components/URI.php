<?php

namespace app\components;


class URI {

    public function __construct() {

    }

    public function get() {
        return $_SERVER['REQUEST_URI'];
    }
}
<?php

namespace app\components;


class App {

    private static $instance;

    private function __construct() {
        ComponentsContainer::create()->register();
    }

    public static function create() {
        self::$instance = self::$instance ? self::$instance : new self();
        return self::$instance;
    }

    public function run() {

    }

    public function __get($attr) {

        if (ComponentsContainer::create()->exists($attr)) {
            return ComponentsContainer::create()->getComponents($attr);
        }
    }


}
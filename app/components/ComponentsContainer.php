<?php

namespace app\components;


class ComponentsContainer {

    private $components = [];
    private static $instance;

    private $componentsConfigPath;

    private function __construct() {
        $this->componentsConfigPath = __DIR__ . '/../config/components.php';
    }

    public static function create() {
        self::$instance = self::$instance ? self::$instance : new self();
        return self::$instance;
    }

    public function setComponent(array $component) {
        $componentId = key($component);
        $componentClass = array_shift($component);

        $this->components[$componentId] = new $componentClass();
        return $this;
    }

    public function getComponents($component) {
        if (!$this->components[$component]) {
            throw new \Exception("Component $component not exists.");
        }

        return $this->components[$component];
    }

    public function register() {
        require_once($this->componentsConfigPath);
    }

    public function exists($componentId) {
        return $this->components[$componentId];
    }


}
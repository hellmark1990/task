<?php

namespace app\components;


class Router {
    protected static $ROUTS = [];

    protected $routsConfigPath;

    public function __construct() {
        $this->routsConfigPath = __DIR__ . '/../config/routes.php';
        $this->register();
    }

    /**
     * @param string $route - route value, example: 'className:method()'
     */
    public static function setRoute($route) {
        $routePath = key($route);
        $routeWay = array_shift($route);

        $routeClass = array_shift(explode(':', $routeWay));
        $routeMethod = end(explode(':', $routeWay));


        self::$ROUTS[$routePath] = [
            'class' => $routeClass,
            'method' => $routeMethod
        ];

        return self;
    }

    protected function register() {
        include_once($this->routsConfigPath);
        return $this;
    }

    protected function exists($route) {
        return self::$ROUTS[$route] ? true : false;
    }

    protected function callRouteActin($route) {
        $routeData = self::$ROUTS[$route];

        $routeClassName = $routeData['class'];
        if (class_exists($routeClassName)) {
            $classObj = new $routeClassName();
            $classMethod = $routeData['method'];

            if (method_exists($classObj, $classMethod)) {
                $classObj->$classMethod();
            } else {
                throw new \Exception("Route class '$routeClassName' method '$classMethod' not exist.");
            }
        } else {
            throw new \Exception("Route class '$routeClassName' not exist.");
        }
    }

    public function run() {
        $route = App::create()->uri->get();
        $route = str_replace('/', '', $route);

        if ($this->exists($route)) {
            $this->callRouteActin($route);
        }

    }


}
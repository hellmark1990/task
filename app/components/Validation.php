<?php

namespace app\components;


class Validation {

    protected $validatedObject;

    public function __construct($validatedObject) {
        $this->setValidatedObject($validatedObject);
    }

    protected function setValidatedObject($validatedObject) {
        if (!(is_object($validatedObject) && method_exists($validatedObject, 'rules'))) {
            throw new \Exception('Not valid object to validate.');
        }

        $this->validatedObject = $validatedObject;
    }

    public function validate() {
            
    }

}
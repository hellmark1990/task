<?php

namespace app\models;


class Model {
    public function __construct() {

    }

    public function fromArray($data) {
        foreach ($data as $attrName => $attrValue) {
            $attrName = ucfirst($attrName);
            $setter = "set$attrName";

            $this->$setter($attrValue);
        }

        return $this;
    }

    public function validate() {

    }
}
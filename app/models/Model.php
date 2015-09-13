<?php

namespace app\models;

use app\components\App;
use app\components\Validation;

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

    public function toArray() {
        $modelArray = [];
        foreach ($this as $fieldName => $fieldValue) {
            $modelArray[$fieldName] = $fieldValue;
        }

        return $modelArray;
    }

    public function validate($scenario) {
        return (new Validation($this, $scenario))->run();
    }

    public function save() {
        $savedFields = $this->savedFields();


        if ($this->getId()) {
            // TODO: UPDATE
        } else {
            $modelArray = $this->toArray();
            foreach ($modelArray as $fieldName => $fieldValue) {
                if (!in_array($fieldName, $savedFields)) {
                    unset($modelArray[$fieldName]);
                }
            }
            return App::create()->db->insert($this->getTableName(), $modelArray);
        }
    }

    public function findOne($whereData){
        $findData = App::create()->db->select($this->getTableName(), $whereData)->findOne();

        dd($findData);
    }
}
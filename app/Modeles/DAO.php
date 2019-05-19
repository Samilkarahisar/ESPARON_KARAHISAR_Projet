<?php

namespace App\Modeles;

use Illuminate\Database\Eloquent\Model;

abstract class DAO extends Model
{
    protected abstract function createObject($stdObject);

    protected function createArray($stdObjects) {
        $newArray = array();
        foreach($stdObjects as $stdObject) {
            $newArray[$stdObject->id] = $this->createObject($stdObject);
        }
        return $newArray;
    }
}

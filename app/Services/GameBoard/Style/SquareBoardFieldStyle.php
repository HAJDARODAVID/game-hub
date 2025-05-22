<?php

namespace App\Services\GameBoard\Style;

class SquareBoardFieldStyle
{
    private $fieldMainStyle=NULL;
    private $specialFieldStyle=[];

    public function getFieldStyle($fieldName = NULL){
        $style = $this->fieldMainStyle;
        if(isset($this->specialFieldStyle[$fieldName]))  $style .= $this->specialFieldStyle[$fieldName];
        return  $style;
    }

    public function setMainFieldStyle($style){
        $this->fieldMainStyle = $style;
        return $this;
    }

    public function setSpecialStyle(array $fieldNames, $style){
        foreach ($fieldNames as $field) {
            $this->specialFieldStyle[$field] = $style;
        }
        return $this;
    }
}
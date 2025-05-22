<?php

namespace App\Services\GameBoard\Fields;

use App\Services\GameBoard\Style\SquareBoardFieldStyle;

class DrinkopolyFields
{

    const MAIN_COLOR_I = '#c73836';
    const MAIN_COLOR_II = '#de8a6a';

    const SPECIAL_COLOR_I = '#4d9900';
    const SPECIAL_COLOR_II = '#a1d968';

    const CORNER_COLOR_I = '#820303';
    const CORNER_COLOR_II = '#bd4040';

    public static function style()
    {
        $fieldStyleObj = new SquareBoardFieldStyle();
        //Set the main filed style
        $fieldStyleObj->setMainFieldStyle(
            'background: '.self::MAIN_COLOR_I.'; 
            background: linear-gradient(180deg, '.self::MAIN_COLOR_I.' 0%, '.self::MAIN_COLOR_II.' 100%);
            border-radius: 8px;'
        );
        //Set the special style
        $fieldStyleObj->setSpecialStyle(['div4', 'div9', 'div16', 'div18', 'div24' , 'div29' , 'div35', 'div38'],
            'background: '.self::SPECIAL_COLOR_I.'; 
            background: linear-gradient(180deg, '.self::SPECIAL_COLOR_I.' 0%, '.self::SPECIAL_COLOR_II.' 100%);'
        );
        $fieldStyleObj->setSpecialStyle(['div1', 'div12', 'div21', 'div32'],
            'background: '.self::CORNER_COLOR_I.'; 
            background: linear-gradient(135deg, '.self::CORNER_COLOR_I.' 0%, '.self::CORNER_COLOR_II.' 100%);'
        );
        return $fieldStyleObj;
    }
}
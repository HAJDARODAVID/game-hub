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
        $fieldStyleObj->setSpecialStyle(['div4', 'div9', 'div15', 'div18', 'div24' , 'div29' , 'div35', 'div38'],
            'background: '.self::SPECIAL_COLOR_I.'; 
            background: linear-gradient(180deg, '.self::SPECIAL_COLOR_I.' 0%, '.self::SPECIAL_COLOR_II.' 100%);'
        );
        $fieldStyleObj->setSpecialStyle(['div1', 'div12', 'div21', 'div32'],
            'background: '.self::CORNER_COLOR_I.'; 
            background: linear-gradient(135deg, '.self::CORNER_COLOR_I.' 0%, '.self::CORNER_COLOR_II.' 100%);'
        );
        return $fieldStyleObj;
        
    }

    public static function text(){
        return [
            'div1' => 'start / cilj',
            'div2' => 'popi j gutljaj',
            'div3' => 'popij kratku',
            'div4' => 'karta',
            'div5' => 'niko ne prije',
            'div6' => 'popij gutljaj i bacaj ponovno',
            'div7' => 'ideš 3 polja nazad',
            'div8' => 'biraj s kim piješ kratku',
            'div9' => 'karta',
            'div10' => 'natrag na start',
            'div11' => 'piješ sa susjedima 3 gutlja',
            'div12' => 'šank',
            'div13' => 'popij gutljal',
            'div14' => 'piješ cijelu čašu',
            'div15' => 'karta',
            'div16' => 'biraj s kim piješ gutljaj',
            'div17' => 'popij kratku',
            'div18' => 'karta',
            'div19' => 'susjedi piju kratku',
            'div20' => 'najmlađi pije gutljaj',
            'div21' => 'striptiz bar',
            'div22' => 'zadnji pije dva gutljaja',
            'div23' => 'svi piju gutljaj osim tebe',
            'div24' => 'karta',
            'div25' => 'popij kratku i idi 2 polja nazad',
            'div26' => 'popij gutljaj',
            'div27' => 's 1, 3, 5 smiješ dalje',
            'div28' => 'piješ cijelu čašu',
            'div29' => 'karta',
            'div30' => 'idi natrag za toliko koliko bacaš',
            'div31' => 'biraj s kim piješ 3 gutljaja',
            'div32' => 'triježnjenje',
            'div33' => 'niko ne prije',
            'div34' => 'najstariji pije 2 gutljaja',
            'div35' => 'karta',
            'div36' => 'svi u trenirki piju gutljaj',
            'div37' => 'svi piju kratku osim tebe',
            'div38' => 'karta',
            'div39' => 'najteži pije 2 kratke',
            'div40' => 'vrati se na striptiz',
            'div41' => 'prvi i zadnji nazdravljaju',
            'div42' => 'popij gutljaj',
            'div43' => 'vrati se 5 polja nazad',
            'div44' => 'nazdravi i popij do dna',
        ];
    }

    public static function icon(){
        return [
            'div1' => 'bi bi-flag',
            'div2' => 'bi bi-cup-straw',
            'div3' => 'bi bi-cup-straw',
            'div4' => 'bi bi-question-square',
            'div5' => 'bi bi-x-circle',
            'div6' => 'bi bi-dice-6',
            'div7' => 'bi bi-emoji-frown',
            'div8' => 'bi bi-people',
            'div9' => 'bi bi-question-square',
            'div10' => 'bi bi-skip-backward',
            'div11' => 'bi bi-people',
            'div12' => 'bi bi-cup-straw',
            'div13' => 'bi bi-cup-straw',
            'div14' => 'bi bi-cup-straw',
            'div15' => 'bi bi-question-square',
            'div16' => 'bi bi-people',
            'div17' => 'bi bi-cup-straw',
            'div18' => 'bi bi-question-square',
            'div19' => 'bi bi-people',
            'div20' => 'bi bi-cup-straw',
            'div21' => 'bi bi-person-arms-up',
            'div22' => 'bi bi-cup-straw',
            'div23' => 'bi bi-cup-straw',
            'div24' => 'bi bi-question-square',
            'div25' => 'bi bi-cup-straw',
            'div26' => 'bi bi-cup-straw',
            'div27' => 'bi bi-dice-6',
            'div28' => 'bi bi-cup-straw',
            'div29' => 'bi bi-question-square',
            'div30' => 'bi bi-dice-6',
            'div31' => 'bi bi-people',
            'div32' => 'bi bi-emoji-frown',
            'div33' => 'bi bi-x-circle',
            'div34' => 'bi bi-cup-straw',
            'div35' => 'bi bi-question-square',
            'div36' => 'bi bi-cup-straw',
            'div37' => 'bi bi-cup-straw',
            'div38' => 'bi bi-question-square',
            'div39' => 'bi bi-cup-straw',
            'div40' => 'bi bi-person-arms-up',
        ];
    }
}
<?php

namespace App\Http\Controllers;

use App\Services\GameBoard\Fields\DrinkopolyFields;
use App\Services\GameBoard\Style\SquareBoardStyle;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function drinkopolyBoard(){
        $style  = SquareBoardStyle::init()
            //set main layout
            ->setGridTemplateColumns(12)->setGridTemplateRows(10)->setGap(5)
            //set the main BG 
            ->setBgTypeAsRadial()->setBgColor('#5A788F')->setBgColorII('#253E54')
            ->setFieldStyles(DrinkopolyFields::style());

        return view('board',[
            'style' => $style,
        ]);
    }
}

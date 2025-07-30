<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameBoardController extends Controller
{
    public function gameBoard(){
        return view('app.game.game-board');
    }
}

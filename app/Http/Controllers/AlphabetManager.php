<?php

namespace App\Http\Controllers;

use App\Models\Alphabet;
use Illuminate\Http\Request;

class AlphabetManager extends Controller
{
    function GetAlphabetHiragana(){
        $alphabet = Alphabet::all();
        return view("include/Hiragana",["alphabet"=>$alphabet]);
    }
    function GetAlphabetKatakana(){

    }
    function GetAlphabetKanji(){

    }
}

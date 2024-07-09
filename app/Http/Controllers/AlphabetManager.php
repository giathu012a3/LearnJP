<?php

namespace App\Http\Controllers;

use App\Models\Alphabet;
use Illuminate\Http\Request;
use Storage;

class AlphabetManager extends Controller
{
    function GetAlphabetHiragana(){
        $alphabet = Alphabet::all();
        $alphabets = json_encode($alphabet);
        Storage::put("alphabets_API.json",$alphabets);
        return view("include/Hiragana",["alphabet"=>$alphabet]);
    }
    function GetAlphabetKatakana(){

    }
    function GetAlphabetKanji(){

    }
}

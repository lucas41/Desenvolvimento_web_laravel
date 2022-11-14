<?php

namespace App\Http\Controllers;

use App\Models\serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieId){

        $temporadas = Serie::find($serieId)->temporadas;
        $serie = Serie::find($serieId);
        
        return view('temporadas.index', compact('serie', 'temporadas'));
    }
}

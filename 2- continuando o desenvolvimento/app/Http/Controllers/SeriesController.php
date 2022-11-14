<?php

namespace App\Http\Controllers;

use App\Models\serie;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;


class SeriesController extends Controller
{
   
    public function index(Request $request){
        $series =  Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create(){
        return view('series/create');
    }

    public function store(SeriesFormRequest $request){
        $serie = serie::create(['nome' => $request->nome]);
        $qtd_temporadas = $request->qtd_temporadas;
        for($i = 1; $i <= $qtd_temporadas; $i++){
            $temporada = $serie->Temporadas()->create(['numero' => $i]);
        }

        for($j = 1; $j <= $request->qtd_episodios; $j++){
            $episodio = $temporada->episodios()->create(['numero' => $j]);
        }
        $request->session()->flash(
         'mensagem',
         "série criada com sucesso {$serie->nome}");
        return redirect('/series');
    }

    public function destroy(Request $request){
        serie::destroy($request->id);
        $request->session()->flash(
            'mensagem',
            "série Deletada com sucesso");
           return redirect('/series');
    }

}

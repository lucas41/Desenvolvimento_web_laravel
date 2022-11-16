<?php

namespace App\Http\Controllers;

use App\Models\serie;
Use App\Services\CriadorDeSerie;
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

    public function store(SeriesFormRequest $request, CriadorDeSerie $CriadorDeSerie){
        
        $serie = $CriadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->qtd_episodios);
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

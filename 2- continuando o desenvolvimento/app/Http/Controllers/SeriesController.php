<?php

namespace App\Http\Controllers;

Use App\Services\RemoverDeSerie;
Use App\Services\CriadorDeSerie;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Models\serie;
use App\Models\Temporada;
use App\Models\Episodio;




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

    public function destroy(Request $request, RemoverDeSerie $RemovedorDeSerie){

        $nomeSerie = $RemovedorDeSerie->Removeserie($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            );
        return redirect()->route('listar_series');

 
    }

}

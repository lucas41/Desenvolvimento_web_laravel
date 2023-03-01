<?php

namespace App\Services;

use App\Models\serie;
use Illuminate\Support\Facades\DB;


class CriadorDeSerie
{   
    public function criarSerie(string $nomeSerie, int $qtd_temporadas, int $qtd_episodios): Serie{

        DB::beginTransaction();
        $serie = serie::create(['nome' => $nomeSerie]);
        for($i = 1; $i <= $qtd_temporadas; $i++){
            $temporada = $serie->Temporadas()->create(['numero' => $i]);
        }

        for($j = 1; $j <= $qtd_episodios; $j++){
            $episodio = $temporada->episodios()->create(['numero' => $j]);
        }
        DB::commit();

        return $serie;
    }
}
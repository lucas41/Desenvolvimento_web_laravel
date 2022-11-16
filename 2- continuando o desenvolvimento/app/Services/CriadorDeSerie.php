<?php

namespace App\Services;

use App\Models\serie;


class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtd_temporadas, int $qtd_episodios): Serie{
        $serie = serie::create(['nome' => $nomeSerie]);
        $qtd_temporadas = $qtd_temporadas;
        for($i = 1; $i <= $qtd_temporadas; $i++){
            $temporada = $serie->Temporadas()->create(['numero' => $i]);
        }

        for($j = 1; $j <= $qtd_episodios; $j++){
            $episodio = $temporada->episodios()->create(['numero' => $j]);
        }

        return $serie;
    }
}
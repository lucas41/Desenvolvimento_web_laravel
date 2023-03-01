<?php

namespace App\Services;

use App\Models\{serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;


class RemoverDeSerie{   

    public function Removeserie(int $serieId): string
    {
        DB::beginTransaction();
        $serie = Serie::find($serieId);
        $nomeSerie = $serie->nome;
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios()->each(function(Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
        $serie->delete();
        DB::commit();
    return $nomeSerie;
    }
}
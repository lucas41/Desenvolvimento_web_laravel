<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;
    public function episodios (){
        return $this->hasMany(Episodio::class);
    }
    
    public function serie(){
        return $this->belongsTo(serie::class);
    }
}



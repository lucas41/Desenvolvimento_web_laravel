<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function temporadas (){
        return $this->hasMany(Temporada::class);
    }
}


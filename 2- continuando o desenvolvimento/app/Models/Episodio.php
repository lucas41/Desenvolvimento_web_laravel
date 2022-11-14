<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

    public function temporada(){
        return $this->belongsTo(temporada::class);
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable=['nome','valor','descricao','categoria_id','image'];
    public function categoria()
    {

        return $this->belongsTo(Categoria::class);
    }
}

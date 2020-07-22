<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    //
    protected $fillable=['descricao','sigla'];
    public function produtos()
    {

        return $this->hasMany(Produto::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    //
    protected $fillable=['descricao'];
    public function produtos()
    {

        return $this->hasMany(Produto::class);
    }
}

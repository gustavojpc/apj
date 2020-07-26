<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    //
    protected $fillable=['descricao','sigla'];
    public static $rules=array(
        'descricao'=>'required| unique:App\Unidade,descricao',
        'sigla'=>'required| unique:App\Unidade,sigla'
    );
    public static $messages=array(
        'descricao.required'=>'Campo NOME é obrigatório!',
        'descricao.unique' => 'Já há uma Unidade com esse nome!',
        'sigla.required'=>'Sigla é obrigatório!',
        'sigla.unique' => 'Já há uma Sigla como essa associada a uma unidade!'

    );
}

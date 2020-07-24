<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable=['nome'];
    public static $rules=array(
        'nome'=>'required| unique:App\Categoria,nome'
    );
    public static $messages=array(
        'nome.required'=>'Campo NOME é obrigatório!',
        'nome.unique' => 'Já há uma Categoria com esse nome!'

       );
}

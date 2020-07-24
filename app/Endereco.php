<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable =['endereco','complemento','bairro','cidade','estado','referencia','numero','CEP','Telefone'];

    public static $rules=array(
        'endereco'=>'required',
        'bairro' => 'required',
        'cidade'=>'required',
        'estado' => 'required',
        'numero'=>'required',
        'CEP' => 'required| numeric',
        'Telefone' => 'required| numeric'
    );
    public static $messages=array(
        'endereco.required'=>'Campo de endereço é obrigatório',
        'bairro.required' => 'Campo de bairro é obrigatório',
        'cidade.required'=>'Campo de cidade é obrigatório',
        'estado.required' => 'Campo de estado é obrigatório',
        'numero.required'=>'Campo de numero é obrigatório',
        'CEP.required' => 'Campo de CEP é obrigatório',
        'CEP.numeric' => 'Campo de CEP é numerico',
        'Telefone.numeric' => 'Campo de Telefone é numerico',
        'Telefone.required' => 'Campo de Telefone é obrigatório'
       );
}


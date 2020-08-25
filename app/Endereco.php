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
        'numero'=>'required| starts_with:0,1,2,3,4,5,6,7,8,9',
        'CEP' => 'required|',
        'Telefone' => 'required|'
    );
    public static $messages=array(
        'endereco.required'=>'Campo de rua é obrigatório',
        'bairro.required' => 'Campo de bairro é obrigatório',
        'cidade.required'=>'Campo de cidade é obrigatório',
        'estado.required' => 'Campo de estado é obrigatório',
        'numero.required'=>'Campo de numero é obrigatório',
        'numero.starts_with' => 'Comece com um número!',
        'CEP.required' => 'Campo de CEP é obrigatório',
        'Telefone.required' => 'Campo de Telefone é obrigatório'
       );
       public function pedidos(){
        return $this->hasMany(Pedidos::class);
    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable =['endereco','complemento','bairro','cidade','estado','referencia','numero','CEP','Telefone'];

}

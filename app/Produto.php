<?php

namespace App;

use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable=['nome','valor','descricao','categoria_id','image','unidade_id','visivel'];

    protected $attributes = [
        'visivel' => 1,
     ];

    public static $rules=array(
        'nome'=>'required| unique:App\Produto,nome',
        'valor'=> 'required',
        'categoria_id' => 'required',
        'unidade_id'=> 'required',
        'descricao' => 'required',
        'image' => 'required| dimensions:max_width=2048,max_height=2048, min_width=100,min_height=100|image'
    );

    public static $messages=array(
        'nome.required' => 'Campo "nome" é obrigatório!',
        'nome.unique' => 'Já há produto com este nome!',
        'valor.required' => 'Campo "valor" é obrigatório!',
        'categoria_id.required' => 'Escolha uma categoria!',
        'unidade_id.required' => 'Escolha uma unidade!',
        'descricao.required' => 'Campo "descrição" é obrigatório!',
        'image.image' => 'Insira apenas um arquivo de imagem!',
        'image.required' => 'Campo "image" é obrigatório!',
        'image.dimensions' => 'Sua imagem não está de acordo com o exigido, max:512X512!'
    );

    public function categoria()
    {

        return $this->belongsTo(Categoria::class);
    }

    public function unidade()
    {

        return $this->belongsTo(Unidade::class);
    }
    public function pedido()
    {

        return $this->hasMany(Pedidos::class);
    }


    public function scopeofFilters($query){
        if(request('search')){
            $query->where('nome','like','%'.request('search').'%');
        }
        if(request('categorias_id')){


            $query->whereIn('categoria_id',request('categorias_id'));
        }
        return $query;
    }



}

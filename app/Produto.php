<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable=['nome','valor','descricao','categoria_id','image','unidade_id','visivel'];

    protected $attributes = [
        'visivel' => 1,
     ];
    public function categoria()
    {

        return $this->belongsTo(Categoria::class);
    }

    public function unidade()
    {

        return $this->belongsTo(Unidade::class);
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

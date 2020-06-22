@extends('layout.main')

@section('title','Produtos')

@section('content')

<!-- products listing -->
         <!-- Latest SHirts -->
         <div class="row">
             @forelse ($produtos as $produto)
             <div class="small-3 columns">
                <div class="item-wrapper">
                        <div class="img-wrapper">
                            <a class="button expanded add-to-cart">
                                Add to Cart
                            </a>
                            <a href="{{url('/detalhe_produto')}}">
                            <img src= "{{ url('images', $produto->image) }}" >
                            </a>
                        </div>
                        <a href="{{url('/detalhe_produto')}}">
                            <h3>
                                {{$produto->nome}}
                            </h3>
                        </a>
                        <h5>
                            {{$produto->valor}}
                        </h5>
                        <p>
                            {{$produto->descricao}}
                        </p>
                    </div>
                </div>
             @empty
                 <h4>Sem produtos cadastrados</h4>
             @endforelse
        </div>

@endsection

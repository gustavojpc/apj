@extends('front.layout.main')
@section('title','APJ | '.$produto->nome.'')
@section('content')


<div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">


            <div class="single-product">
              <img src="{{ url('images', $produto->image) }}" alt="#" class="img-fluid">
            </div>

        </div>
        <div class="col-lg-5">
          <div class="single_product_text">
          <h3>{{$produto->nome}} <br>
            <ul class="unordered-list">
                <li><p>Este produto é vendido em: <b>{{$produto->unidade->descricao}}</b></p> </li>
                <li><p>Valor do produto: R$ {{$produto->valor}}</p> </li>

            </ul>
            <div class="card_area">
                <div class="product_count_area">
                    <div class="padding-right">
                        Quantidade:
                    </div>

                    {{ Form::open(array('route' => 'carrinho.store')) }}
                        @if ( $produto->unidade->sigla == "Un")
                            {!! Form::select('qty',$qtde, 1,['class'=>'select-cart padding-left']) !!}
                        @else
                            <input name="qty" type="text" value="1" min="0" max="10" class="select-cart ">
                        @endif

                         {{$produto->unidade->sigla}}
                         {!! Form::hidden('id', $produto->id) !!}
                </div>
              <div class="add_to_cart">
                  {!! Form::submit('Adicionar ao carrinho', ['class'=>'btn_3']) !!}
                  {!! Form::close() !!}

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

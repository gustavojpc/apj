@extends('front.layout.main')

@section('content')
    <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">


      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">





            @if (is_null($ultimoendereco))
                {!! Form::open(['route'=>'endereco.store','method'=>'post']) !!}
            @endif
                {!! Form::model($ultimoendereco,['route'=>'endereco.store','method'=>'post']) !!}

            <div class="row">
                <div class="col-lg-12" style="padding-top: 30px">
                    <h2>Dados de entrega</h2>
                </div>

                <div class="col-lg-12 text-bottom">
                    {!! Form::label('endereco', 'Rua') !!}
                    @error('endereco')
                        <p class="help-block">{{ $message }}</p>
                    @enderror
                    {!! Form::text('endereco',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error': 'form-control text-bottom' ]) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('complemento', 'Complemento') !!}
                    {!! Form::text('complemento',null,['class'=>'form-control']) !!}
                </div>
                <div class="col-lg-4 text-bottom">
                    {!! Form::label('bairro', 'Bairro') !!}
                    {!! Form::text('bairro',null,['class'=>'form-control']) !!}
                </div>
                <div class="col-lg-4 text-bottom">
                    {!! Form::label('cidade', 'Cidade') !!}
                    {!! Form::text('cidade',null,['class'=>'form-control']) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('estado', 'Estado') !!}
                    {!! Form::text('estado',null,['class'=>'form-control']) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('numero', 'Numero') !!}
                    {!! Form::text('numero',null,['class'=>'form-control']) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('CEP', 'CEP') !!}
                    {!! Form::text('CEP',null,['class'=>'form-control']) !!}
                </div>



                <div class="col-lg-4 text-bottom">
                    {!! Form::label('referencia', 'Ponto de referência') !!}
                    {!! Form::text('referencia',null,['class'=>'form-control']) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('telefone', 'Telefone') !!}
                    {!! Form::text('Telefone',null,['class'=>'form-control']) !!}


                </div>
                <div class="col-lg-12">
                    {!! Form::submit('Finalizar pedido',['class'=>'genric-btn primary']) !!}
                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Resumo do pedido</h2>
              <ul class="list">
                <li>
                  <a >Produto
                    <span>Total</span>
                  </a>
                </li>

                @foreach ($cartItems as $cartItem)
                    <li>
                        <a>
                        {{$cartItem->name}}
                        <span class="middle">x {{$cartItem->qty}}</span>
                        <span class="last">R$ {{$cartItem->price}}</span>
                    </a>
                    </li>
                @endforeach





                <li>
                  <a href="#">Total
                    <span>R$ {{Cart::total()}}</span>
                  </a>
                </li>
              </ul>
              <div class="payment_item">

                <p>
                  O pagamento da compra é feito durante a entrega do pedido,
                  você receberá um e-mail confirmando os dados da compra.
                </p>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


  <!--================End Checkout Area =================-->



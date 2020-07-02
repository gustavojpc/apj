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
            <p>Dados de entrega</p>

            {!! Form::open(['route' => 'endereco.store', 'method' => 'post']) !!}
            {!! Form::label('endereco', 'Endereço') !!}
            {!! Form::text('endereco',null, array('class'=>'form-control')) !!}

            {!! Form::label('complemento', 'Complemento') !!}
            {!! Form::text('complemento',null, array('class'=>'form-control')) !!}

            {!! Form::label('numero', 'Número') !!}
            {!! Form::number('numero',null, array('class'=>'form-control')) !!}

            {!! Form::label('bairro', 'Bairro') !!}
            {!! Form::text('bairro',null, array('class'=>'form-control')) !!}

            {!! Form::label('telefone', 'Telefone') !!}
            {!! Form::text('telefone',null, array('class'=>'form-control')) !!}

            {!! Form::label('CEP', 'CEP') !!}
            {!! Form::text('CEP',null, array('class'=>'form-control')) !!}

            {!! Form::label('cidade', 'Cidade') !!}
            {!! Form::text('cidade',null, array('class'=>'form-control')) !!}

            {!! Form::label('estado', 'Estado') !!}
            {!! Form::text('estado',null, array('class'=>'form-control')) !!}


            {!! Form::label('referencia', 'Ponto de Referência') !!}
            {!! Form::text('referencia',null, array('class'=>'form-control')) !!}

            {!! Form::submit('Salvar', array('class' => 'btn-sucess')) !!}


            {!! Form::close() !!}


          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
                <li>
                  <a href="#">Fresh Blackberry
                    <span class="middle">x 02</span>
                    <span class="last">$720.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Fresh Tomatoes
                    <span class="middle">x 02</span>
                    <span class="last">$720.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Fresh Brocoli
                    <span class="middle">x 02</span>
                    <span class="last">$720.00</span>
                  </a>
                </li>
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="#">Subtotal
                    <span>$2160.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Shipping
                    <span>Flat rate: $50.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Total
                    <span>$2210.00</span>
                  </a>
                </li>
              </ul>
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" name="selector" />
                  <label for="f-option5">Check payments</label>
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="selector" />
                  <label for="f-option6">Paypal </label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" />
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


  <!--================End Checkout Area =================-->



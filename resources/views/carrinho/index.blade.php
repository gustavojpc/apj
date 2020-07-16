@extends('front.layout.main')

@section('content')
<section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">

          <table class="table">
            <thead>
              <tr>
                <th scope="col"><p>Nome</p></th>
                <th scope="col"><p>Preço</p></th>
                <th scope="col"><p>Quantidade</p></th>
                <th scope="col"><p>Valor total</p></th>
                <th scope="col"><p></p></th>
              </tr>
            </thead>
            <tbody>

                @forelse ($cartItems as $cartItem)


                   <tr>
                        <td>
                          <div class="media">

                              <p>{{$cartItem->name}}</p>

                          </div>
                        </td>
                        <td>
                          <p>R$ {{$cartItem->price}}</p>
                        </td>
                        <td>
                          <div class="product_count">
                            {!! Form::open(['route' => ['carrinho.update',$cartItem->rowId] , 'method' => 'PUT']) !!}

                                <input style="border: 1px solid" name="qty" type="text" value="{{$cartItem->qty}}" min="0" max="10">


                            <button type="submit" class="btn_cart small">
                                <i class="fas fa-sync" style=""></i>
                             </button>
                             {!! Form::close() !!}
                            </div>
                        </td>
                        <td>
                          <p>R$ {{$cartItem->subtotal()}}</p>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['carrinho.destroy',$cartItem->rowId] , 'method' => 'PUT']) !!}
                                <button type="submit" class="btn_cart small">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                {!! Form::close() !!}


                        </td>

                      </tr>


                @empty
                    <div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading"></h4>
                      <p>Sem produtos no carrinho</p>
                      <p class="mb-0"></p>
                    </div>
                @endforelse

                @if (count($cartItems)>0)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    Subtotal
                    </td>
                    <td>
                        R$ {{Cart::subtotal()}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    Frete
                    </td>
                    <td>
                        {{Cart::tax()}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    Total
                    </td>
                    <td>
                        R$ {{Cart::total()}} <td>
                </tr>
                @endif





            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{ url('/produtos') }}">Continuar comprando</a>
            <a class="btn_1 checkout_btn_1" href="{{ route('checkout.entrega') }}">Finalizar compra</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
@endsection



@extends('front.layout.main')

@section('content')
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Carrinho</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="cart_area section_padding">
    <div class="container">

      <div class="cart_inner">
        <div class="table-responsive">

                @if (count($cartItems)>0)
                <table class="table">
                    <thead class="head-cart">
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Valor total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td class="tabela-cart">
                                <div class="media">
                                    <p>{{$cartItem->name}}</p>
                                </div>
                            </td>
                            <td class="tabela-cart">
                                <p>R$ {{$cartItem->price}}</p>

                            </td>
                            <td class="tabela-cart">
                                <div class="product_count">
                                {!! Form::open(['route' => ['carrinho.update',$cartItem->rowId] , 'method' => 'PUT']) !!}

                                    <input style="border: 1px solid" name="qty" type="text" value="{{$cartItem->qty}}" min="0" max="10">


                                    {{$cartItem->options->size}}.
                                <button type="submit" class="btn_cart small">
                                    <i class="fas fa-sync" style=""></i>
                                </button>
                                {!! Form::close() !!}
                                </div>
                            </td>
                            <td class="tabela-cart">
                                <p>R$ {{$cartItem->subtotal()}}</p>
                            </td>
                            <td class="tabela-cart">
                                {!! Form::open(['route' => ['carrinho.destroy',$cartItem->rowId] , 'method' => 'PUT']) !!}
                                <button type="submit" class="btn_cart small">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach

                    @if (count($cartItems)>0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th >
                        Subtotal
                        </td>
                        <th>
                            R$ {{Cart::subtotal()}}
                        </th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th >
                        Frete
                        </th>
                        <th>
                            {{Cart::tax()}}
                        </th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>
                        Total
                        </th>
                        <th>
                            R$ {{Cart::total()}} </th>
                    </tr>
                </tbody>
            </table>


                            <div class="checkout_btn_inner float-right">
                                <a class="btn_1" href="{{ url('/produtos') }}">Continuar comprando</a>
                                <a class="btn_1 checkout_btn_1" href="{{ route('checkout.entrega') }}">Finalizar compra</a>
                            </div>



                    @endif






                @else
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"></h4>
                    <p>Sem produtos no carrinho</p>
                    <p class="mb-0"></p>
                </div>
                @endif



        </div>
      </div>
  </section>

  <section class="latest-product-area padding-bottom">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <!-- Section Tittle -->
            <div class="col-xl-12 col-lg-5 col-md-5">

                    <h2 class="text-center">Mais comprados</h2>

            </div>

        </div>
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            <!-- card one -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">

                    @forelse ($produtos->chunk(4) as $chunk)
                    @foreach ($chunk as $produto)


                    <div class="col-xl-3 col-lg-3 col-md-2">
                        <div class="single-product mb-60">

                            <div class="product-caption text-bottom">
                                <p class="titulo">{{$produto->nome}}</p>
                            </div>
                            <div class="product-img">
                                <img src="{{ url('images', $produto->image) }}" alt="">

                            </div>
                            <div class="product-caption text-bottom">


                                <div class="price">
                                    <ul>
                                        <li>R$ {{$produto->valor}}</li>

                                    </ul>
                                </div>
                            </div>
                            <a href="{{route('carrinho.edit',$produto->id)}}" class="button expanded add-to-cart">
                               Comprar <i class="fas fa-cart-plus    "></i>
                            </a>
                        </div>
                    </div>
                    @endforeach

                    @empty
                        <h4>Sem produtos cadastrados</h4>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End Nav Card -->
    </div>
</section>
  <!--================End Cart Area =================-->
@endsection



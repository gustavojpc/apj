@extends('layout.main')

@section('content')
<section class="hero text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <h2 >
        <strong>
            Hey! Welcome to MC- Mykey's Store
        </strong>
    </h2>
    <br>
    <a href="{{url('/produtos')}}"><button class="button large">Check out My Shirts</button></a>
</section>
<br/>
<div class="subheader text-center">
     <h2>
    MyKey&rsquo;s Latest Shirts
</h2>
</div>

<!-- Latest SHirts -->
<div class="row">
    @forelse ($produtos->chunk(4) as $chunk)
    @foreach ($chunk as $produto)
        <div class="small-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="{{route('carrinho.edit',$produto->id)}}" class="button expanded add-to-cart">
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
    @endforeach

    @empty
        <h4>Sem produtos cadastrados</h4>
    @endforelse
</div>
<!-- Footer -->
<br>
@endsection

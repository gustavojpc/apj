@extends('layout.main')
@section('content')


    <h3>Carrinho</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{$cartItem->name}}</td>
                        <td>{{$cartItem->price}}</td>
                        <td>{{$cartItem->qty}}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
@endsection


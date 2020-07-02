@extends('admin.layout.admin')

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <h3>Pedidos</h3>

    @forelse ($pedidos as $pedido)
        <ul>
            <li><h4>Nome do produto: {{ $pedido->user->name}}</h4></li>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço total</th>
                    </tr>
                </thead>

                @foreach ($pedido->ItensPedido as $item)
                <tr>
                    <td>{{$item->nome}}</td>


                </tr>
                @endforeach
                <tbody>


                </tbody>
            </table>

        </ul>
    @empty
        <h4>Sem produtos cadastrados</h4>
    @endforelse


@endsection

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


        <table class="table">
            <thead>
                <tr>
                    <th>Cliente: {{ $pedido->user->name}}</th>
                    <th>Estado: Pendente</th>
                    <th><button type="button" class="btn btn-primary">Entregar pedido</button></th>
                </tr>
            </thead>

        </table>
            <table class="table">
                <thead>
                    <tr>
                        <td><b>Produto</b></td>
                        <td><b>Quantidade</b></td>
                        <td><b>Preço total</b></td>

                    </tr>
                </thead>

                @foreach ($pedido->ItensPedido as $item)
                <tr>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->pivot->qtde}}</td>
                    <td>R$ {{$item->pivot->total}}</td>


                </tr>
                @endforeach
                <tbody>


                </tbody>
            </table>

    @empty
        <h4>Sem produtos cadastrados</h4>
    @endforelse


@endsection

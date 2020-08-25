@extends('front.minhaconta.main')
@section('title','ADMIN | Minha Conta')


@section('conteudo')
    <div class="border border-light" id="conteudo">
        <table class="table table-striped" style="margin-bottom: 0;">
            <thead>
                <tr id="primeiralinha">
                <th scope="col">Nº do Pedido</th>
                <th scope="col">Data</th>
                <th scope="col">Total</th>
                <th scope="col">Situação</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index=0;
                @endphp
                @foreach($pedidos as $pedido)

                    <tr @if($index%2==0)id="linha"@endif>
                        <th scope="row">{{ $pedido->id }}</th>
                        <td>{{ $pedido->created_at->format('d/m/Y')}}</td>
                        <td>{{ $pedido->total }} R$</td>
                        <td>
                            @if ($pedido->entregue==1)
                            <span class="badge badge-primary">Enviado</span>
                            @else
                            <span class="badge badge-warning">Espera</span>
                            @endif
                        </td>
                    </tr>
                    @php
                        $index++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>


@endsection


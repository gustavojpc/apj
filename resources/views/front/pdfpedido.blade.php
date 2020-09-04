<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido APJ</title>
</head>
<style>
    .borda-lisa {
      border: 1px solid black;
      border-collapse: collapse;
    }
    .borda-lisa tr th {
      border: 1px solid black;
      border-collapse: collapse;
    }
    .borda-lisa tr td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    </style>
<body>


    <table width="100%" style="padding-top: 20px; padding-bottom: 40px;">
        <thead>
            <tr>
                <th width="33%"><img src="{{ url('assets/img/logo','logo.png')}}" alt=""></th>
                <th width="33%"><h2>Resumo do pedido</h2></th>
                @foreach ($pedido as $item)
            <td align="right" width="33%">Pedido numero: {{$item->id}}</td>
                @endforeach
            </tr>
        </thead>

    </table>

    <table algin="right" width="100%" class="borda-lisa" style="padding-top: 40px">
            @foreach ($pedido as $item)
            <tr>
                <th width="10%">Nome:</th>
                <td colspan="5" style="padding-left: 10px" align="left" width="90%">{{ $item->user->name}}</td>
            </tr>

            <tr>
                <th colspan="6" width="10%">Dados do cliente</th>

            </tr>

            <tr>
                <th width="10%">Email:</th>
                <td colspan="3" style="padding-left: 10px" align="left" width="40%">{{ $item->user->email}}</td>
                <th width="20%">Data da compra:</th>
                <td  style="padding-left: 10px" align="left" width="30%">{{ $item->created_at->format('d/m/Y H:i:s')}}</td>
            </tr>

            <tr>
                <th colspan="6" width="10%">Dados de entrega</th>

            </tr>

            <tr>
                <th width="10%">Rua:</th>
                <td colspan="3" style="padding-left: 10px" align="left" width="33%">{{ $item->endereco->endereco}}</td>
                <th width="10%">Bairro:</th>
                <td style="padding-left: 10px" align="left" width="33%">{{ $item->endereco->bairro}}</td>
            </tr>
            <tr>
                <th width="10%">Numero:</th>
                <td style="padding-left: 10px" align="left" width="33%">{{ $item->endereco->numero}}</td>
                <th width="10%">Complemento:</th>
                <td style="padding-left: 10px" align="left" width="33%">{{ $item->endereco->complemento}}</td>
                <th width="10%">CEP:</th>
                <td style="padding-left: 10px" align="left" width="33%">{{ $item->endereco->CEP}}</td>
            </tr>
            <tr>
                <th colspan="2" width="10%">Ponto de referência:</th>
                <td colspan="2" style="padding-left: 10px" align="left" width="33%">{{ $item->endereco->referencia}}</td>
                <th width="10%">Telefone:</th>
                <td style="padding-left: 10px" align="left" width="33%">{{ $item->endereco->Telefone}}</td>
            </tr>
            @endforeach

    </table>

    <table width="100%" class="borda-lisa" style="padding-top: 40px">
        <tr>
            <th colspan="6" width="10%">Itens do pedido</th>

        </tr>
        <tr>
            <th colspan="4" width="50%">Item</th>
            <th  width="25%">Quantidade</th>
            <th  width="25%">Valor Total</th>

        </tr>

            @foreach ($itenspedido as $item)
                <tr align="center">
                    <td colspan="4" width="50%">{{$item->nome}}</td>
                    <td  width="25%">{{$item->qtde}} {{$item->sigla}} </td>
                    <td  width="25%">R$ {{$item->total}}</td>

                </tr>

        @endforeach
        <tr align="center">
            <th colspan="5" width="75%">Frete</th>
            @foreach ($pedido as $item)
                <th  width="25%">R$ 5</th>
            @endforeach


        </tr>
        <tr align="center">
            <th colspan="5" width="75%">Valor do pedido</th>
            @foreach ($pedido as $item)
                <th  width="25%">R$ {{number_format($item->total, '2',',', '.')}}</th>
            @endforeach


        </tr>

    </table>
</body>
</html>

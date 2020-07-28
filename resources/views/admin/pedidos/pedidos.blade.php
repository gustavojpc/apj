@extends('admin.layout.includes.main')
@section('title','ADMIN | Pedidos')
<style>
    table{
        width: 100%;

    }
    table tr{
        height: 30px;;

    }
    table td{
        text-align: center;
        border: 1px solid;
    }
    table th{
        text-align: center;
        border: 1px solid;
    }

</style>
@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Pedidos</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Produto</li>
                </ol>
              </div>
            </div>
            <form action="{{ url('admin/')}}">
                @csrf
            <div class="row mb-2">



                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="">Data</label>
                        <input type="date" name="data" value="{{$data}}" id="" class="form-control" placeholder="" aria-describedby="helpId">

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="">Status do pedido</label>
                            <select type="select" name="status" class="form-control" aria-describedby="helpId">
                                <option value="1" @if($status==1) selected @endif>Não entregues</option>
                                <option value="2" @if($status==2) selected @endif>Entregues</option>
                                <option value="3" @if($status==3) selected @endif>Todos</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="">Cliente</label>
                        <input type="number" name="cliente" value="{{$cliente}}" id="" class="form-control" placeholder="" aria-describedby="helpId">

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>



            </div>
        </form>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">

            @forelse ($pedidos as $pedido)
            <div class="col-md-4">
            <div class="card {{$pedido->entregue==0 ? 'card-danger' : 'card-success'}} collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $pedido->id}}: {{ $pedido->user->name}} - {{ $pedido->created_at ->format('d/m H:i') }}</h3>

                        <div class="card-tools">
                            @if ($pedido->entregue==0)
                            <a  href="admin/pedidos/{{$pedido->id}}/entregar"><button title="Entregar pedido" type="button" class="btn btn-tool"><i class="fas fa-check"></i></button></a>
                            @else
                            <a  href="admin/pedidos/{{$pedido->id}}/entregar"><button title="Cancelar entrega" type="button" class="btn btn-tool"><i class="fas fa-times"></i></button></a>
                            @endif
                            <button  type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>

                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <b style="padding-bottom: 20px">Hora do pedido: {{$pedido->created_at->format('H:i:s')}}</b> <br><br>
                        <table>
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
                        <b> <br>Endereco de entrega:</b> <br><br>
                        <div class="text-center">

                        </div>
                        <table  >
                            <tr>
                                <th width="10%">Rua:</th>
                                <td colspan="3" style="padding-left: 10px" align="left" width="40%">{{ $pedido->endereco->endereco}}</td>
                                <th width="10%">Bairro:</th>
                                <td style="padding-left: 10px" align="left" width="40%">{{ $pedido->endereco->bairro}}</td>
                            </tr>
                            <tr>
                                <th width="10%">Numero:</th>
                                <td style="padding-left: 10px" align="left" width="10%">{{ $pedido->endereco->numero}}</td>
                                <th width="20%">Complemento:</th>
                                <td style="padding-left: 10px" align="left" width="20%">{{ $pedido->endereco->complemento}}</td>
                                <th width="20%">CEP:</th>
                                <td style="padding-left: 10px" align="left" width="20%">{{ $pedido->endereco->CEP}}</td>
                            </tr>
                            <tr>
                                <th colspan="2" width="10%">Ponto de referência:</th>
                                <td colspan="2" style="padding-left: 10px" align="left" width="33%">{{ $pedido->endereco->referencia}}</td>
                                <th width="10%">Telefone:</th>
                                <td style="padding-left: 10px" align="left" width="33%">{{ $pedido->endereco->Telefone}}</td>
                            </tr>
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>




            @empty
            </div>
            <div class="alert alert-danger" role="alert">
                <strong>Sem pedidos</strong>
            </div>
        @endforelse






        </section>
        <!-- /.content -->
      </div>




@endsection

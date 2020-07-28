@extends('admin.layout.includes.main')
@section('title','Painel Admin | Relatório de venda')

@yield('APJ | Páginal')
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
                <form action="{{ url('admin/relatorio/vendas')}}">
                    @csrf
                <div class="row mb-2">

                        <div class="col-sm-12">
                            <h1>Relatório vendas</h1>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="">Periodo Inicial</label>
                            <input type="date" name="datainicio" value="{{$datainicio}}" id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="">Periodo Final</label>
                            <input type="date" name="datafim" value="{{$datafim}}"  id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="">Cliente</label>
                            <input type="number" name="cliente" value="{{$cliente}}" id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>



                </div>
            </form>
            </div><!-- /.container-fluid -->
            </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Vendas</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped projects">
                  <thead>
                      <tr>
                          <th style="width: 1%">
                              #
                          </th>
                          <th style="width: 25%">
                            Data do pedido
                          </th>
                          <th style="width: 40%">
                           Cliente
                          </th>
                          <th style="width: 15%">
                            Valor total
                          </th>
                          <th style="width: 20%">
                            Status
                          </th>

                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($pedidos as $pedido)


                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <a>
                                {{$pedido->created_at->format('d/m/Y H:i:s')}}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{$pedido->user->name}}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{$pedido->total}}
                            </a>
                        </td>
                        <td class="project-state">

                            @if ($pedido->entregue==1)
                            <span class="badge badge-success">Entregue</span>
                            @else
                            <span class="badge badge-danger">Não entregue</span>
                            @endif
                        </td>





                    </tr>

                @empty
                    <div class="alert alert-danger" role="alert">
                        <strong>Sem pedidos</strong>
                    </div>
                @endforelse


                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>




@endsection

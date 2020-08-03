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
                <form action="{{ url('admin/relatorio/meses')}}">
                    @csrf
                <div class="row mb-2">

                        <div class="col-sm-12">
                            <h1>Relatório vendas</h1>
                        </div>

                        <div class="col-sm-4">

                            <div class="form-group">
                                <label for="">Mês</label>
                                <select class="custom-select" name="Mes" id="" value="{{ $Mes }}">
                                    @if(request('Mes'))
                                        @if($Mes == 1)
                                            <option selected> Janeiro</option>
                                            @elseif($Mes == 2)
                                                <option selected> Fevereiro</option>
                                            @elseif($Mes == 3)
                                                <option selected> Março</option>
                                            @elseif($Mes == 4)
                                                <option selected> Abril</option>
                                            @elseif($Mes == 5)
                                                <option selected> Maio</option>
                                            @elseif($Mes == 6)
                                                <option selected> Junho</option>
                                            @elseif($Mes == 7)
                                                <option selected> Julho</option>
                                            @elseif($Mes == 8)
                                                <option selected> Agosto</option>
                                            @elseif($Mes == 9)
                                                <option selected> Setembro</option>
                                            @elseif($Mes == 10)
                                                <option selected> Outubro</option>
                                            @elseif($Mes == 11)
                                                <option selected> Novembro</option>
                                            @elseif($Mes == 12)
                                                <option selected> Dezembro</option>
                                        @endif
                                    @else
                                        <option selected value="{{ date('m') }}"> {{ date('F') }}</option>
                                    @endif
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="">Ano</label>
                            <select class="custom-select" name="Ano" id="" value="{{ date('Y') }}">
                                @if(request('Ano'))
                                    <option selected value="{{  $Ano }}">{{  $Ano }}</option>
                                @endif
                                @for($i=date('Y'); $i>=1900; $i--)
                                    <option value='{{ $i }}'> {{ $i }} </option>
                                @endfor
                            </select>
                            </div>
                        </div>


                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
            </div><!-- /.container-fluid -->
            </section>

        <!-- Main content -->
        @if(request('Mes'))
        <section class="content">

            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    @if($Mes == 1)
                        Janeiro
                    @elseif($Mes == 2)
                        Fevereiro
                    @elseif($Mes == 3)
                        Março
                    @elseif($Mes == 4)
                        Abril
                    @elseif($Mes == 5)
                        Maio
                    @elseif($Mes == 6)
                        Junho
                    @elseif($Mes == 7)
                        Julho
                    @elseif($Mes == 8)
                        Agosto
                    @elseif($Mes == 9)
                        Setembro
                    @elseif($Mes == 10)
                        Outubro
                    @elseif($Mes == 11)
                        Novembro
                    @elseif($Mes == 12)
                        Dezembro
                @endif

            </h3>

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
                            <th style="width: 15%">
                              Total de Vendas
                            </th>
                            <th style="width: 15%">
                             Valor Arrecadado
                            </th>
                            <th style="width: 15%">
                              Vendas Entregues
                            </th>
                            <th style="width: 15%">
                              Dia mais Vendidos
                            </th>
                            <th style="width: 15%">
                                Vendas do melhor dia
                            </th>
                            <th style="width: 15%">
                                Produto Mais Vendido
                            </th>
                            <th style="width: 10%">
                                nº de clientes
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                      @if($pedidos->isNotEmpty())


                      <tr>
                          <td>
                              #
                          </td>
                          <td>
                              <a>
                                  {{ count($pedidos) }}
                              </a>
                          </td>
                          <td>
                              <a>
                                  {{ $pedidos->sum('total')}}
                              </a>
                          </td>
                          <td>
                              <a>
                                  {{ $pedidos->sum('entregue') }}
                              </a>
                          </td>
                          <td>
                            {{ $Diamaisvendido }}
                          </td>
                          <td>
                              {{ $Vendasdomelhordia }}
                          </td>
                          <td>
                              {{ $queryv[0]->nome }}
                        </td>
                        <td>
                            {{ count($pedidos->groupby('user_id')) }}
                      </td>
                      </tr>

                  @else
                      <div class="alert alert-danger" role="alert">
                          <strong>Sem pedidos</strong>
                      </div>
                  @endif


                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          @endif
          <!-- /.content -->
        </div>






@endsection

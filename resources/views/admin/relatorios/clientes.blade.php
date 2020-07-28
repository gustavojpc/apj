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
                <form action="{{ url('admin/relatorio/clientes')}}">
                    @csrf
                <div class="row mb-2">

                        <div class="col-sm-12">
                            <h1>Relatório vendas</h1>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="">Código</label>
                            <input type="number" name="codigo" value="{{$codigo}}" id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="text" name="email" value="{{$email}}"  id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" name="nome" value="{{$nome}}" id="" class="form-control" placeholder="" aria-describedby="helpId">

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
              <h3 class="card-title">Clientes</h3>

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
                              # Codigo
                          </th>
                          <th style="width: 25%">
                            E-mail
                          </th>
                          <th style="width: 40%">
                           Cliente
                          </th>


                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($clientes as $cliente)


                    <tr>
                        <td>
                            {{$cliente->id}}
                        </td>
                        <td>
                            <a>
                                {{$cliente->email}}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{$cliente->name}}
                            </a>
                        </td>






                    </tr>

                @empty
                    <div class="alert alert-danger" role="alert">
                        <strong>Sem clientes</strong>
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

@extends('admin.layout.includes.main')
@section('title','ADMIN | Produto')

@yield('APJ | Páginal')
@section('content')

@if(Session::has('mensagem-sucesso'))
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
                <h1>Produtos</h1>
            </div>
            <div class="col-sm-6">

            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Produtos</h3>

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
                      <th style="width: 0%">
                        Nome do produto
                      </th>
                      <th style="width: 10%">
                        Valor
                      </th>
                      <th style="width: 20%" class="text-center">
                        Categoria do produto
                      </th>
                      <th style="width: 20%">
                        Medida de venda
                      </th>
                      <th class="text-center" style="width: 30%">
                        Ações
                      </th>
                  </tr>
              </thead>
              <tbody>
                @forelse ($produtos as $produto)


                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            {{ $produto->nome }}
                        </a>


                    </td>
                    <td>
                        R$ {{ $produto->valor }}
                    </td>
                    <td>
                        {{$produto->categoria->nome}}
                    </td>
                    <td>
                        {{$produto->unidade->descricao}}
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="produto/{{$produto->id}}/estado">
                            @if ($produto->visivel==0)
                            <i class="fas fa-eye" title="Ativar produto"></i>Ativar
                            @else
                                <i class="fas fa-eye-slash" title="Desativar produto"></i>Desativar
                            @endif
                        </a>
                        <a class="btn btn-info btn-sm" href="produto/{{$produto->id}}/editar">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Editar
                        </a>
                        {!! Form::open(['method' => 'DELETE', 'url' => '/admin/produto/'.$produto->id,'style' => 'display:inline' ])!!}

                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>


                        {!!Form::close()!!}
                    </td>
                </tr>

            @empty
                <h4>Sem produtos cadastrados</h4>
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

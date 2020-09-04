@extends('admin.layout.includes.main')
@section('title','ADMIN | Categoria')

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
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categorias</h1>
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
              <h3 class="card-title">Categorias</h3>

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
                            Nome da categoria
                          </th>
                          <th class="text-center" style="width: 30%">
                            Ações
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($categorias as $categoria)


                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <a>
                                {{ $categoria->nome }}
                            </a>


                        </td>


                        <td class="project-actions text-right">

                            <a class="btn btn-info btn-sm" href="categoria/{{$categoria->id}}/editar">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Editar
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'url' => '/admin/categoria/'.$categoria->id,'style' => 'display:inline' ])!!}

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash">
                                    </i>
                                    Deletar
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

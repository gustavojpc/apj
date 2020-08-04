@extends('admin.layout.includes.main')
@section('title','ADMIN | Categoria')

@section('content')

    <h3>Adicionar categorias</h3>



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Produto</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Produto</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Categoria</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    @if (Request::is('*/editar'))
                    {!! Form::model($categoria,['method' => 'PATCH', 'url' => 'admin/editar/'.$produto ->id, 'files' => true]) !!}

                    @else
                        {!! Form::open(['route' => 'produto.store', 'method' => 'post', 'files' => true]) !!}

                    @endif


                    <div class="row">

                        <div class="col-sm-8">
                            <div class="form-group">

                                {!! Form::label('nome', 'Nome',) !!}
                                {!! Form::text('nome',null,['class'=> $errors->has('nome') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                                @error('nome')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        </div>
                        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>


                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

          </div>

        </section>
        <!-- /.content -->
      </div>





@endsection

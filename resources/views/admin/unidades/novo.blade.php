@extends('admin.layout.includes.main')
@section('title','ADMIN | Unidades')

@section('content')

    <h3>Adicionar unidade</h3>



    <div class="content-wrapper">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Unidade</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Unidade</li>
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
                  <h3 class="card-title">Unidade</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    @if (Request::is('*/editar'))
                    {!! Form::model($unidade,['method' => 'PATCH', 'url' => 'admin/unidade/'.$unidade ->id, 'files' => true]) !!}

                    @else
                        {!! Form::open(['route' => 'unidade.store', 'method' => 'post', 'files' => true]) !!}

                    @endif


                    <div class="row">

                        <div class="col-sm-8">
                            <div class="form-group">

                                {!! Form::label('descricao', 'Descricao',) !!}
                                {!! Form::text('descricao',null,['class'=> $errors->has('descricao') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                                @error('descricao')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">

                                {!! Form::label('sigla', 'Sigla',) !!}
                                {!! Form::text('sigla',null,['class'=> $errors->has('sigla') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                                @error('sigla')
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

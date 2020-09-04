@extends('admin.layout.includes.main')
@section('title','ADMIN | Produto')

@section('content')


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
                  <h3 class="card-title">Produto</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    @if (Request::is('*/editar'))
                    {!! Form::model($produto,['method' => 'PATCH', 'url' => 'admin/produto/'.$produto ->id, 'files' => true]) !!}

                    @else
                        {!! Form::open(['route' => 'produto.store', 'method' => 'post', 'files' => true]) !!}

                    @endif


                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                {!! Form::label('nome', 'Nome') !!}
                                {!! Form::text('nome',null,['class'=> $errors->has('nome') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                                @error('nome')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('valor', 'Valor') !!}
                                {!! Form::text('valor',null,['class'=> $errors->has('valor') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                                @error('valor')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('categoria_id', 'Categoria') !!}
                                {!! Form::select('categoria_id',$categorias, null, array('class'=>'form-control', 'placeholder'=>'Selecione uma categoria' )) !!}
                                @error('categoria_id')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('unidade_id', 'Unidade de venda') !!}
                                {!! Form::select('unidade_id',$unidades, null, array('class'=>'form-control', 'placeholder'=>'Selecione uma unidade' )) !!}
                                @error('unidade_id')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        @if (Request::is('*/editar'))
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('descricao', 'Descrição do produto') !!}
                                    {!! Form::text('descricao', null, array('class'=>'form-control')) !!}

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('image', 'Imagem atual') !!}
                                    {!! Form::file('image',null,['class'=> $errors->has('image') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                                    @error('image')
                                        <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <img class="img-fluid" src="{{ url('images', $produto->image) }}" alt="">
                            </div>
                        @else
                            <div class="col-lg-4">
                                <div class="form-group">

                                    {!! Form::label('image', 'Imagem') !!}
                                    {!! Form::file('image', array('class'=>'form-control')) !!}
                                    @error('image')
                                        <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('descricao', 'Descrição do produto') !!}
                                    {!! Form::text('descricao',null,['class'=> $errors->has('descricao') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                                    @error('descricao')
                                        <p class="help-block">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>
                        @endif

                        <div class="col-lg-12">
                            <div class="form-group">

                                {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}

                            </div>
                        </div>
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

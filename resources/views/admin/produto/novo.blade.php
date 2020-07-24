@extends('admin.layout.admin')

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif



    <div class="row">
        @if (Request::is('*/editar'))
        {!! Form::model($produto,['method' => 'PATCH', 'url' => 'admin/produto/'.$produto ->id, 'files' => true]) !!}
        <h3>Editar produto</h3>
        @else
            {!! Form::open(['route' => 'produto.store', 'method' => 'post', 'files' => true]) !!}
            <h3>Adicionar produto</h3>
        @endif


            <div class="form-group">
                <div class="col-lg-8">
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::text('nome',null,['class'=> $errors->has('nome') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                    @error('nome')
                        <p class="help-block">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('valor', 'Valor') !!}
                    {!! Form::text('valor',null,['class'=> $errors->has('valor') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                    @error('valor')
                        <p class="help-block">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('categoria_id', 'Categoria') !!}
                    {!! Form::select('categoria_id',$categorias, null, array('class'=>'form-control', 'placeholder'=>'Selecione uma categoria' )) !!}
                    @error('categoria_id')
                        <p class="help-block">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('unidade_id', 'Unidade de venda') !!}
                    {!! Form::select('unidade_id',$unidades, null, array('class'=>'form-control', 'placeholder'=>'Selecione uma unidade' )) !!}
                    @error('unidade_id')
                        <p class="help-block">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @if (Request::is('*/editar'))
                <div class="col-lg-8">
                    <div class="form-group">
                        {!! Form::label('descricao', 'Descrição do produto') !!}
                        {!! Form::textarea('descricao', null, array('class'=>'form-control')) !!}

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('image', 'Imagem atual') !!}
                        {!! Form::text('image',null,['class'=> $errors->has('image') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                        @error('image')
                            <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-4">

                    <img class="img-responsive" src="{{ url('images', $produto->image) }}" alt="">
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
@endsection

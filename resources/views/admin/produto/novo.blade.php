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

    <h3>Adicionar produtos</h3>

    <div class="row">
        {!! Form::open(['route' => 'produto.store', 'method' => 'post', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', null, array('class'=>'form-control','')) !!}
                @if ($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('categoria_id', 'Categoria') !!}
                {!! Form::select('categoria_id',$categorias, null, array('class'=>'form-control', 'placeholder'=>'Selecione uma categoria' )) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descricao', 'Nome') !!}
                {!! Form::text('descricao', null, array('class'=>'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::text('valor', null, array('class'=>'form-control')) !!}
            </div>


            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image', array('class'=>'form-control')) !!}
            </div>
        {!! Form::submit('Salvar', ['class'=>'btn-btn-default']) !!}
        {!! Form::close() !!}

    </div>
@endsection

@extends('admin.layout.admin')
@section('title','ADMIN | Categoria')

@section('content')

    <h3>Adicionar categorias</h3>

    <div class="row">
        {!! Form::open(['route' => 'categoria.store', 'method' => 'post', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, array('class'=>'form-control')) !!}
        </div>

        </div>
        {!! Form::submit('Salvar', ['class'=>'btn-btn-default']) !!}
        {!! Form::close() !!}

    </div>
@endsection

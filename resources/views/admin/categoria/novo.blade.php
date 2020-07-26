@extends('admin.layout.admin')
@section('title','ADMIN | Categoria')

@section('content')

    <h3>Adicionar categorias</h3>

    <div class="row">
        {!! Form::open(['route' => 'categoria.store', 'method' => 'post', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            @error('nome')
                <p class="help-block">{{ $message }}</p>
            @enderror
            {!! Form::text('nome',null,['class'=> $errors->has('nome') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
        </div>

        </div>
        {!! Form::submit('Salvar', ['class'=>'btn-btn-default']) !!}
        {!! Form::close() !!}

    </div>
@endsection

@extends('admin.layout.admin')
@section('title','ADMIN | Unidades')

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
        <h3>Adicionar Unidades</h3>
        {!! Form::open(['route' => 'unidade.store', 'method' => 'post', 'files' => true]) !!}
        <div class="col-lg-10">

                {!! Form::label('descricao', 'Nome da unidade',) !!}
                {!! Form::text('descricao', null, array('class'=>'form-control')) !!}

        </div>
        <div class="col-lg-2">

            {!! Form::label('sigla', 'Sigla da unidade',) !!}
            {!! Form::text('sigla', null, array('class'=>'form-control')) !!}

    </div>

        <div class="col-lg-12"  style="padding-top:15px"'>
            {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>






    </div>
@endsection

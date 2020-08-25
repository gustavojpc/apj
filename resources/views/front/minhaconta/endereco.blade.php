@extends('front.minhaconta.main')
@section('title','ADMIN | Minha Conta')
<style>
    #div_body
    {
        height: 170vh!important;
    }
    #submit-btn
    {
        margin-top: 20px;
    }
</style>
@section('conteudo')

    @if (is_null($ultimoendereco))
    {!! Form::open(['route'=>'endereco.store','method'=>'post']) !!}
    @endif
    {!! Form::model($ultimoendereco,['route'=>'endereco.store','method'=>'post']) !!}


    <div class="row" id='conteudo'>

        <div class="col-lg-6 text-bottom">
            {!! Form::label('endereco', 'Rua*') !!}
            {!! Form::text('endereco',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
            @error('endereco')
               <p class="error-block">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-lg-6 text-bottom">
            {!! Form::label('complemento', 'Complemento') !!}
            {!! Form::text('complemento',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
        </div>

        <div class="col-lg-6 text-bottom">
            {!! Form::label('bairro', 'Bairro*') !!}
            {!! Form::text('bairro',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
            @error('bairro')
                <p class="error-block">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-lg-6 text-bottom">
            {!! Form::label('cidade', 'Cidade*') !!}
            {!! Form::text('cidade',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
            @error('cidade')
                <p class="error-block">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-lg-6 text-bottom">
            {!! Form::label('estado', 'Estado*') !!}
            {!! Form::text('estado',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
            @error('estado')
                <p class="error-block">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-lg-6 text-bottom">
            {!! Form::label('numero', 'Numero*') !!}
            {!! Form::text('numero',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
            @error('numero')
                <p class="error-block">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-lg-6 text-bottom">
            {!! Form::label('CEP', 'CEP*') !!}
            {!! Form::text('CEP',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom','data-mask'=>'00000-000','reverse'=>'true','minlength'=>'9']) !!}
            @error('CEP')
                <p class="error-block">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-lg-6 text-bottom">
            {!! Form::label('referencia', 'Ponto de referência') !!}
            {!! Form::text('referencia',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
        </div>

        <div class="col-lg-6 text-bottom">
            {!! Form::label('telefone', 'Telefone*') !!}
            {!! Form::text('telefone',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom','data-mask'=>'(00) 0 0000-0000','reverse'=>'true','minlength'=>'16']) !!}
            @error('telefone')
                <p class="error-block">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-lg-6 text-bottom">
            {{ Form::hidden('fecharpedido', false ) }}
            {!! Form::submit('Alterar Endereço',['class'=>'btn btn-primary btn-sm', 'id'=>'submit-btn']) !!}
        </div>

    </div>

@endsection

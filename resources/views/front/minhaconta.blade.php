@extends('front.layout.main')
@section('title','APJ | Minha conta')
@section('content')

<div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="hero-cap text-center">
                    <h2 class="titulo-pagina">Minha conta</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 border-minhaconta">

            <h5 style="padding-top: 10px">Meus dados</h5>

            {!! Form::model($user,['user' => 'PATCH', 'url' => 'minhaconta/editar/'.$user->id]) !!}


                <div class="col-lg-12">
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::text('name', null, array('class'=>'form-control','')) !!}
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                    @endif
                </div>
                <div class="col-lg-12" style="padding-bottom: 10px">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, array('class'=>'form-control','disabled')) !!}
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                    @endif
                </div>
                <div class="col-lg-4" style="display: inline">
                    <button class="genric-btn primary">Alterar senha</button>
                    {!! Form::submit('Salvar',['class'=>'genric-btn primary']) !!}
                </div>
            {!! Form::close() !!}


        </div>
        <div class="col-lg-1">
            </div>
        <div class="col-lg-5 border-minhaconta">

                @if (is_null($ultimoendereco))
                {!! Form::open(['route'=>'endereco.store','method'=>'post']) !!}
            @endif
                {!! Form::model($ultimoendereco,['route'=>'endereco.store','method'=>'post']) !!}

            <div class="row">
                <div class="col-lg-12" >
                    <h5 style="padding-top: 10px">Dados de entrega</h5>
                </div>

                <div class="col-lg-12 text-bottom">
                    {!! Form::label('endereco', 'Rua') !!}
                    @error('endereco')
                        <p class="error-block">{{ $message }}</p>
                    @enderror
                    {!! Form::text('endereco',null,  ['class'=> $errors->has('endereco') ? 'form-control text-bottom input-error':'form-control text-bottom' ]) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('complemento', 'Complemento') !!}
                    {!! Form::text('complemento',null,['class'=>'form-control']) !!}
                </div>
                <div class="col-lg-4 text-bottom">
                    {!! Form::label('bairro', 'Bairro') !!}
                    {!! Form::text('bairro',null,['class'=>'form-control']) !!}
                </div>
                <div class="col-lg-4 text-bottom">
                    {!! Form::label('cidade', 'Cidade') !!}
                    {!! Form::text('cidade',null,['class'=>'form-control']) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('estado', 'Estado') !!}
                    {!! Form::text('estado',null,['class'=>'form-control']) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('numero', 'Numero') !!}
                    {!! Form::text('numero',null,['class'=>'form-control']) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('CEP', 'CEP') !!}
                    {!! Form::text('CEP',null,['class'=>'form-control']) !!}
                </div>



                <div class="col-lg-4 text-bottom">
                    {!! Form::label('referencia', 'Ponto de referência') !!}
                    {!! Form::text('referencia',null,['class'=>'form-control']) !!}
                </div>

                <div class="col-lg-4 text-bottom">
                    {!! Form::label('telefone', 'Telefone') !!}
                    {!! Form::text('Telefone',null,['class'=>'form-control']) !!}


                </div>
                <div class="col-lg-12">
                    {!! Form::submit('Salvar',['class'=>'genric-btn primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>


        </div>
      </div>
    </div>
  </div>


@endsection

@extends('admin.layout.admin')

@yield('APJ | Páginal')
@section('content')

    @if(Session::has('mensagem-sucesso'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <h3>Produtos</h3>
    <table class="table">
        <thead>
            <tr>
                <td><b>Nome do produto</b> </td>
                <td><b>Valor</b></td>
                <td><b>Categoria do produto</b></td>
                <td><b>Medida de venda</b></td>
                <td><b>Ações</b></td>

            </tr>
        </thead>
        <tbody>


            @forelse ($produtos as $produto)
                <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ $produto->valor }}</td>
                        <td>{{$produto->categoria->nome}}</td>
                        <td>{{$produto->unidade->descricao}}</td>
                        <td >
                            {!! Form::open(['method' => 'DELETE', 'url' => '/admin/produto/'.$produto->id,'style' => 'display:inline' ])!!}

                            <button type="submit" class="btn btn-default"><i class="fas fa-trash delete" title="Exluir produto"></i></button>
                            {!!Form::close()!!}


                            <a href="produto/{{$produto->id}}/editar"> <button  class="btn btn-default"><i class="fas fa-edit" title="Editar produto"></i></button></a>



                        <a href="produto/{{$produto->id}}/estado"> <button type="submit" class="btn btn-default">
                        @if ($produto->visivel==0)
                            <i class="fas fa-eye" title="Ativar produto"></i>
                        @else
                            <i class="fas fa-eye-slash" title="Inativar produto"></i>
                        @endif

                        </button></a>

                        </td>
                    </tr>
            @empty
                <h4>Sem produtos cadastrados</h4>
            @endforelse
</tbody>
</table>


@endsection

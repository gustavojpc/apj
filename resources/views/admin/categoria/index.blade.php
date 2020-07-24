@extends('admin.layout.admin')

@yield('APJ | Páginal')
@section('content')

    @if(Session::has('success'))
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
                <td><b>Nome da categoria</b> </td>

                <td><b>Ações</b></td>

            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                        <td>{{ $categoria->nome }}</td>

                        <td style="font-color: black">{!! Form::open(['method' => 'DELETE', 'url' => '/admin/categoria/'.$categoria->id,'style' => 'display:inline' ])!!}

                        <button type="submit" class="btn btn-default"><i class="fas fa-trash delete" title="Exluir Categoria"></i></button>
                        {!!Form::close()!!}  <i class="fas fa-edit    "></i></td>
                    </tr>
            @empty
                <h4>Sem Categorias cadastradas</h4>
            @endforelse
        </tbody>
    </table>


@endsection

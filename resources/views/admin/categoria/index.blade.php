@extends('admin.layout.admin')
@section('title','ADMIN | Categoria')

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

                        <td style="font-color: black"><i class="fa fa-trash" style="padding-right: 5px; color: red" aria-hidden="true"></i>   <i class="fas fa-edit    "></i></td>
                    </tr>
            @empty
                <h4>Sem produtos cadastrados</h4>
            @endforelse
</tbody>
</table>


@endsection

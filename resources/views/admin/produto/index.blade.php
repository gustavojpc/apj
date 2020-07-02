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

    <h3>Produtos</h3>

    @forelse ($produtos as $produto)
        <ul>
            <li><h4>Nome do produto: {{ $produto->nome }}</h4></li>
            <li><h4>Categoria: {{count:$product->categoria?$produto->categoria->nome:"N/A"}}</h4></li>
        </ul>
    @empty
        <h4>Sem produtos cadastrados</h4>
    @endforelse


@endsection

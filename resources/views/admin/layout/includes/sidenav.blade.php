{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block; ">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{url('admin/pedidos')}}"><i class="glyphicon glyphicon-home"></i>
                    Pedidos pendentes</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Produtos
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('produto.index')}}">Lista de Produtos</a></li>
                    <li><a href="{{route('produto.create')}}">Adicionar Produtos</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Categoria
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('categoria.index')}}">Lista de Categorias</a></li>
                    <li><a href="{{route('categoria.create')}}">Adicionar categorias</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Unidades
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('unidade.index')}}">Lista de Unidades</a></li>
                    <li><a href="{{route('unidade.create')}}">Adicionar Unidades</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->

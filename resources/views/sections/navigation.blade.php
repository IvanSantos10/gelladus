<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="https://png.icons8.com/metro/540/g.png" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{ Auth::user()->name }}</h1>
            <p>{{ Auth::user()->role == 1 ? "admin" : "Funcionario" }}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
    <ul class="list-unstyled">
        <li class="active"> <a href="/home"><i class="icon-home"></i>Home</a></li>
        <li class="active"> <a href="{{ route('registros.index') }}"><i class="icon-user"></i>Usuários</a></li>
        <li class="active"> <a href="{{ route('produtos.index') }}"><i class="icon-grid"></i>Produtos</a></li>
        <li class="active"> <a href="{{ route('estoques.index') }}"><i class="icon-padnote"></i>Estoque</a></li>
        <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Pedido</a>
            <ul id="dashvariants" class="collapse list-unstyled">
                <li class="active"> <a href="{{ route('pedidos.create') }}"><i class="icon-grid"></i>Criar</a></li>
                <li class="active"> <a href="{{ route('pedidos.index') }}"><i class="icon-grid"></i>Aberto</a></li>
                <li class="active"> <a href="{{ route('pedidos.fechado') }}"><i class="icon-grid"></i>Fechado</a></li>
            </ul>
        </li>
    </ul>
</nav>
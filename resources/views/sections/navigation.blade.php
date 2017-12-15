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
        <li class="active"> <a href="./"><i class="icon-home"></i>Home</a></li>
        <li class="active"> <a href="./"><i class="icon-home"></i>Usuários</a></li>
        <li class="active"> <a href="./"><i class="icon-home"></i>Produtos</a></li>
    </ul>
</nav>
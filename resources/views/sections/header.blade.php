<header class="header">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                    <!-- Navbar Brand --><a href="{{ url('/home') }}" class="navbar-brand">
                        <div class="brand-text brand-big hidden-lg-down">
                            <strong>{{ config('app.name', 'Laravel') }}</strong>
                        </div>
                        <div class="brand-text brand-small"><strong>G`S</strong></div></a>
                    <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                </div>

                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Logout    -->
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link logout"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Sair<i class="fa fa-sign-out"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
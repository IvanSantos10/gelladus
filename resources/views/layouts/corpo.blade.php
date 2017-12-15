@extends('layouts.app')

@section('content')
    <div class="page home-page">
        <!-- Navbar Header-->
        @include('sections.header')

        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            @include('sections.navigation')

            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">Dashboard</h2>
                    </div>
                </header>

                <!-- Projects Section-->
                @yield('contents')

                <!-- Page Footer-->
                @include('sections.footer')

            </div>
        </div>
    </div>
@endsection

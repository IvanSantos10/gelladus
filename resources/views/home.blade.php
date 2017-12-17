@extends('layouts.corpo')

@section('title', 'Home')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </div>
    </ul>
    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                {{ config('app.name') }}
            </div>
        </div>
    </section>
@endsection

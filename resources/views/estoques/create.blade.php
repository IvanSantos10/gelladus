@extends('layouts.corpo')

@section('title', 'Criar estoque')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/estoques">Estoques</a></li>
            <li class="breadcrumb-item active">Criar estoque</li>
        </div>
    </ul>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => 'estoques.store', 'class' => 'form']) !!}
                            <div class="panel-body">
                                @include('estoques._form')
                            </div>
                            <div class="panel-footer">
                                <center>
                                    {!! Html::openFormGroup() !!}
                                    {!! form::submit('Criar estoque', ['class' => 'btn btn-primary']) !!}
                                    {!! Html::closeFormGroup() !!}
                                </center>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

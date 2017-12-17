@extends('layouts.corpo')

@section('title', 'Editar produto')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/produtos">Produtos</a></li>
            <li class="breadcrumb-item active">Editar produto</li>
        </div>
    </ul>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::model($produto, [
                            'route' => ['produtos.update', 'produto' => $produto->id],
                            'class' => 'form', 'method' => 'PUT']) !!}
                            <div class="panel-body">
                                @include('produtos._form')
                            </div>
                            <div class="panel-footer">
                                <center>
                                    {!! Html::openFormGroup() !!}
                                    {!! form::submit('Criar produto', ['class' => 'btn btn-primary']) !!}
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

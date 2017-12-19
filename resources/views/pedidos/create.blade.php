@extends('layouts.corpo')

@section('title', 'Criar pedido')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/pedidos">Pedidos</a></li>
            <li class="breadcrumb-item active">Criar pedido</li>
        </div>
    </ul>
    <section class="">
        <div class="container-fluid">
            <!-- Project-->
            <div class="project no-padding">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-12 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <a class="btn btn-primary"
                               href="{{ route('produtos.store') }}"
                               onclick="event.preventDefault();document.getElementById('form-store').submit();">Criar pedido</a>
                        </div>
                        <div class="oculte">
                            {!! Form::model(compact('search'), ['class'=>'form-inline', 'method'=> 'GET'])!!}
                            {!! Form::label('search', 'Pesquisar', ['class' => 'control-label']) !!}
                            {!! Form::text('search', null, ['class' => 'form-control']) !!}
                            {!! Form::submit('Pesquisar', array('class' => 'btn btn-primary')) !!}
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="projects no-padding-top">
        <div class="container-fluid">
            {!! Form::open(['route' => 'pedidos.store', 'class' => 'form', 'id' => 'form-store']) !!}
            <div class="row">
                @foreach($estoques as $estoque)
                <div class="chart col-lg-3 col-12">
                    <div class="has-shadow bg-white">
                        <div class="title">
                            <strong class="text-violet">
                                {{$estoque->produto->preco_formart}}
                            </strong>
                            <br><small> {{ $estoque->produto->nome  }}</small>
                        </div>
                        <div class="form-group row card-body">
                            <label class="col-sm-4 form-control-label">Quant.</label>
                            <div class="col-sm-8">
                                {!! Form::number("produto[{$loop->index}][quatidade]", 0, ['min' => 1, 'style' => 'width:90%', 'class' => 'form-control form-control-sm']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                    {!! Form::hidden("produto[{$loop->index}][produto_id]", $estoque->produto->id) !!}
                    {!! Form::hidden("produto[{$loop->index}][preco]", $estoque->produto->preco) !!}
                @endforeach

            </div>
            {!! Form::close() !!}
        </div>
    </section>
    <section class="">
        <div class="container-fluid">
            <!-- Project-->
            <div class="project no-padding">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-12 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <a class="btn btn-primary"
                               href="{{ route('produtos.store') }}"
                               onclick="event.preventDefault();document.getElementById('form-store').submit();">Criar pedido</a>
                        </div>
                        <div class="oculte">
                            {!! Form::model(compact('search'), ['class'=>'form-inline', 'method'=> 'GET'])!!}
                            {!! Form::label('search', 'Pesquisar', ['class' => 'control-label']) !!}
                            {!! Form::text('search', null, ['class' => 'form-control']) !!}
                            {!! Form::submit('Pesquisar', array('class' => 'btn btn-primary')) !!}
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

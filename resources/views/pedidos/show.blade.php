@extends('layouts.corpo')

@section('title', 'Criar pedido')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/pedidos">Pedidos</a></li>
            <li class="breadcrumb-item active">Visualizar pedido {{ $pedido->id }}</li>
        </div>
    </ul>

    @include('sections.message')

    <section class="">
        <div class="container-fluid">
            <!-- Project-->
            <div class="project no-padding">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <a class='btn btn-warning'
                               href="{{ route('pedidos.edit', ['pedido' => $pedido->id]) }}">Editar</a>
                        </div>
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center col-lg-6">
                            <div class="text-left">
                                <small class="text-violet">Total:</small>
                                <strong class="text">
                                    {{$pedido->total}}
                                </strong>
                            </div>
                        </div>
                        <div class="project-title d-flex align-items-center col-lg-6">
                            <div class="text-right">
                                <a class="btn btn-primary" href="{{ route('pedido.finalizado',['pedido' => $pedido->id]) }}">Finalizar pedido</a>
                            </div>
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
                @foreach($pedido->produtos as $item)
                    <div class="chart col-lg-3 col-12">
                        <div class="has-shadow bg-white">
                            <div class="title">
                                <strong class="text-violet">
                                    {{$item->preco_formart}}
                                </strong>
                                <br>
                                <small> {{ $item->produto->nome  }}</small>
                            </div>
                            <div class="form-group row card-body">
                                <label class="col-sm-4 form-control-label">Quant.</label>
                                <div class="col-sm-8">
                                    <strong class="text">
                                        {{$item->quantidade}} und
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::hidden("produto[{$loop->index}][produto_id]", $item->produto->id) !!}
                    {!! Form::hidden("produto[{$loop->index}][quantidate]", $item->quantidade) !!}
                    {!! Form::hidden("produto[{$loop->index}][preco]", $item->produto->preco) !!}
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
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <a class='btn btn-warning'
                               href="{{ route('pedidos.edit', ['pedido' => $pedido->id]) }}">Editar</a>
                        </div>
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center col-lg-6">
                            <div class="text-left">
                                <small class="text-violet">Total:</small>
                                <strong class="text">
                                    {{$pedido->total}}
                                </strong>
                            </div>
                        </div>
                        <div class="project-title d-flex align-items-center col-lg-6">
                            <div class="text-right">
                                <a class="btn btn-primary" href="{{ route('pedido.finalizado',['pedido' => $pedido->id]) }}">Finalizar pedido</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

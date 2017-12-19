@extends('layouts.corpo')

@section('title', 'Editar pedido')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/pedidos">Pedidos</a></li>
            <li class="breadcrumb-item active">Editar pedido {{$pedido->id}}</li>
        </div>
    </ul>

    @include('sections.message')

    <section class="">
        <div class="container-fluid">
            <!-- Project-->
            <div class="project no-padding">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-12 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <a class="btn btn-primary"
                               href="{{ route('pedidos.update', ['pedido' => $pedido->id]) }}"
                               onclick="event.preventDefault();document.getElementById('form-store').submit();">Editar
                                pedido</a>
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
        {!! Form::model($pedido->produtos,['route' => ['pedidos.update', 'pedido' => $pedido->id], 'class' => 'form', 'id' => 'form-store', 'method' => 'PUT']) !!}

        <!-- Editar-->
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
                                        {!! Form::number("produto[{$loop->index}][quatidade]", $item->quantidade, ['min' => 1, 'style' => 'width:90%', 'class' => 'form-control form-control-sm']) !!}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::hidden("produto[{$loop->index}][produto_id]", $item->produto->id) !!}
                    {!! Form::hidden("produto[{$loop->index}][preco]", $item->produto->preco) !!}

                    @php
                        $loop2 = $loop->index + 1 ;
                    @endphp
                @endforeach
            </div>
            <!-- incluir pedido-->

            <div class="project no-padding">
                <div class="row bg-white has-shadow">
                    <div class="col-lg-12 text-center">
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($estoques as $estoque)
                    @php
                     $loop3 = $loop->index + ($loop2 ?? 1);
                    @endphp
                    <div class="chart col-lg-3 col-12">
                        <div class="has-shadow bg-white">
                            <div class="title">
                                <strong class="text-violet">
                                    {{$estoque->produto->preco_formart}}
                                </strong>
                                <br>
                                <small> {{ $estoque->produto->nome  }} </small>
                            </div>
                            <div class="form-group row card-body">
                                <label class="col-sm-4 form-control-label">Quant.</label>
                                <div class="col-sm-8">
                                    {!! Form::number("produto[{$loop3}][quatidade]", 0, ['min' => 1, 'style' => 'width:90%', 'class' => 'form-control form-control-sm']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::hidden("produto[{$loop3}][produto_id]", $estoque->produto->id) !!}
                    {!! Form::hidden("produto[{$loop3}][preco]", $estoque->produto->preco) !!}
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
                               href="{{ route('pedidos.update', ['pedido' => $pedido->id]) }}"
                               onclick="event.preventDefault();document.getElementById('form-store').submit();">Editar
                                pedido</a>
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

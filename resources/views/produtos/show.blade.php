@extends('layouts.corpo')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Produtos</li>
        </div>
    </ul>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-close">
                            {!! Form::model(compact('search'), ['class'=>'form-inline', 'method'=> 'GET'])!!}
                            {!! Form::label('search', 'Pesquisar', ['class' => 'control-label']) !!}
                            {!! Form::text('search', null, ['class' => 'form-control']) !!}
                            {!! Form::submit('Pesquisar', array('class' => 'btn btn-primary')) !!}
                            {!! Form::close()!!}
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <a class="btn btn-primary" href="{{route('produtos.create')}}">Novo produto</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($produtos as $produto)
                                    <tr>
                                        <td class="col-md-1">{{ $produto->nome}}</td>
                                        <td class="col-md-2">{{ $produto->preco}}</td>
                                        <td class="col-md-2 hidden-print">
                                            <ul class="list-inline">
                                                <li>
                                                    <a class='btn btn-warning'
                                                       href="{{ route('produtos.edit', ['produto' => $produto->id]) }}"><span
                                                                class='glyphicon glyphicon-edit'></span></a>
                                                </li>
                                                <li>
                                                    <a class='btn btn-danger'
                                                       href="{{ route('produtos.show', ['produto' => $produto->id]) }}"><span
                                                                class='glyphicon glyphicon-trash'></span></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

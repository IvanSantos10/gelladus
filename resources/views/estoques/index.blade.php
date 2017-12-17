@extends('layouts.corpo')

@section('title', 'Lista de estoques')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Estoques</li>
        </div>
    </ul>

    @include('sections.message')

    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-close oculte">
                            {!! Form::model(compact('search'), ['class'=>'form-inline', 'method'=> 'GET'])!!}
                            {!! Form::label('search', 'Pesquisar', ['class' => 'control-label']) !!}
                            {!! Form::text('search', null, ['class' => 'form-control']) !!}
                            {!! Form::submit('Pesquisar', array('class' => 'btn btn-primary')) !!}
                            {!! Form::close()!!}
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <a class="btn btn-primary" href="{{route('estoques.create')}}">Novo estoque</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Produto</th>
                                    <th>Lote</th>
                                    <th>Quantidade</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($estoques as $estoque)
                                    <tr>
                                        <td>{{ $estoque->id}}</td>
                                        <td>{{ $estoque->produto->nome}}</td>
                                        <td >{{ $estoque->lote}}</td>
                                        <td>{{ $estoque->quantidade}}</td>
                                        <td>
                                            <a class='btn btn-warning'
                                               href="{{ route('estoques.edit', ['estoque' => $estoque->id]) }}">Editar</a>
                                            <a class="btn btn-danger"
                                               href="{{ route('estoques.destroy',['estoque' => $estoque->id]) }}"
                                               onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
                                            {{Form::open(['route' => ['estoques.destroy',$estoque->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
                                            {{Form::close()}}

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

@extends('layouts.corpo')

@section('title', 'Lista de produtos')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Produtos</li>
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
                            <a class="btn btn-primary" href="{{route('produtos.create')}}">Novo produto</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->id}}</td>
                                        <td >{{ $produto->nome}}</td>
                                        <td>{{ $produto->preco_formart}}</td>
                                        <td>
                                            <a class='btn btn-warning'
                                               href="{{ route('produtos.edit', ['produto' => $produto->id]) }}">Editar</a>
                                            <a class="btn btn-danger"
                                               href="{{ route('produtos.destroy',['produto' => $produto->id]) }}"
                                               onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
                                            {{Form::open(['route' => ['produtos.destroy',$produto->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
                                            {{Form::close()}}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $produtos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

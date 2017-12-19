@extends('layouts.corpo')

@section('title', 'Lista de pedidos fechado')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Pedidos fechado</li>
        </div>
    </ul>

    @include('sections.message')

    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="oculte">
                                {!! Form::model(compact('search'), ['class'=>'form-inline', 'method'=> 'GET'])!!}
                                {!! Form::label('search', 'Pesquisar', ['class' => 'control-label']) !!}
                                {!! Form::text('search', null, ['class' => 'form-control']) !!}
                                {!! Form::submit('Pesquisar', array('class' => 'btn btn-primary')) !!}
                                {!! Form::close()!!}
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Iten</th>
                                    <th>Qnt total</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pedidos as $pedido)
                                    @php
                                        $deleteForm = "form-delete-{$pedido->id}";
                                    @endphp
                                    <tr>
                                        <td>{{ $pedido->id}}</td>
                                        <td>{{ $pedido->produtos()->count('id')}}</td>
                                        <td>{{ $pedido->produtos()->sum('quantidade')}}</td>
                                        <td >{{ $pedido->total}}</td>
                                        <td>
                                            <a class='btn btn-success'
                                               href="{{ route('pedidos.show', ['pedido' => $pedido->id]) }}">Visualizar</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $pedidos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

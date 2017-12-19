@extends('layouts.corpo')

@section('title', 'Lista de Usuários')

@section('contents')
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Usuários</li>
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
                            <a class="btn btn-primary" href="{{route('registros.create')}}">Novo usuário</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Função</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id}}</td>
                                        <td>{{ $user->name}}</td>
                                        <td >{{ $user->email}}</td>
                                        <td>{{ $user->role}}</td>
                                        <td>
                                            <a class='btn btn-warning'
                                               href="{{ route('registros.edit', ['user' => $user->id]) }}">Editar</a>
                                            <a class="btn btn-danger"  href="#"
                                               {{--href="{{ route('registros.destroy',['user' => $user->id]) }}"--}}
{{--
                                               onclick="event.preventDefault();if(confirm('Deseja excluir?')){document.getElementById('form-delete').submit();}
--}}
">Excluir</a>
                                            {{Form::open(['route' => ['registros.destroy',$user->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
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

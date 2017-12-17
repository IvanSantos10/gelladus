{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('nome', $errors) !!}
{!! Form::label('nome', 'Nome', ['class' => 'form-control-label']) !!}
{!! Form::text('nome', null, ['class' => 'form-control']) !!}
{!! Form::error('nome', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('preco', $errors) !!}
{!! Form::label('preco', 'Preço', ['class' => 'form-control-label']) !!}
{!! Form::text('preco', null, ['class' => 'form-control']) !!}
{!! Form::error('preco', $errors) !!}
{!! Html::closeFormGroup() !!}
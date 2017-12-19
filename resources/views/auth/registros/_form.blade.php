{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('name', $errors) !!}
{!! Form::label('name', 'Nome', ['class' => 'form-control-label']) !!}
{!! Form::text('name', null, ['class' => 'form-control']) !!}
{!! Form::error('name', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('email', $errors) !!}
{!! Form::label('email', 'E-mail', ['class' => 'form-control-label']) !!}
{!! Form::email('email', null, ['class' => 'form-control']) !!}
{!! Form::error('email', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('role', $errors) !!}
{!! Form::label('role', 'Função', ['class' => 'form-control-label']) !!}
{!! Form::select('role', [1=>'Admin', 2=>'Caixa'],null, ['class' => 'form-control']) !!}
{!! Form::error('role', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('password', $errors) !!}
{!! Form::label('password', 'Senha', ['class' => 'form-control-label']) !!}
{!! Form::password('password', ['class' => 'form-control']) !!}
{!! Form::error('password', $errors) !!}
{!! Html::closeFormGroup() !!}
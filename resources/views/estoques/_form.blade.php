{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('produto', $errors) !!}
{!! Form::label('produto', 'Produto', ['class' => 'form-control-label']) !!}
{!! Form::select('produto_id', $produtos, null, ['class' => 'form-control']) !!}
{!! Form::error('produto', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('lote', $errors) !!}
{!! Form::label('lote', 'Lote', ['class' => 'form-control-label']) !!}
{!! Form::text('lote', null, ['class' => 'form-control']) !!}
{!! Form::error('lote', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('quantidade', $errors) !!}
{!! Form::label('quantidade', 'Quantidade', ['class' => 'form-control-label']) !!}
{!! Form::text('quantidade', null, ['class' => 'form-control']) !!}
{!! Form::error('quantidade', $errors) !!}
{!! Html::closeFormGroup() !!}
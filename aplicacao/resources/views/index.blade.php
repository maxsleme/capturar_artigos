@extends('layout.default')
@section('content')
@include('partials.messages')

<div class="container margin-top">
    <div class="col-md-offset-3 col-md-6 col-xs-offset-0 col-xs-12 col-lg-offset-3 col-lg-6 col-sm-offset-2 col-sm-8">
        <p class=""><strong>Informe seus dados de acesso</strong></p>

        {!! Form::open(['url' => 'login']) !!}
            <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
            </div>
            <div class="form-group">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
            </div>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    {!! Form::submit('Login', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@stop

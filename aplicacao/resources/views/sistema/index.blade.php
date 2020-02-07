@extends('layout.default')
@section('content')
@include('partials.messages')

<div class="container margin-top">
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <p>Bem vindo {{ Auth::user()->name }}  <a href="{{ url('logout')}}">Logout</a></p>
		<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 box-pesquisar">
        {!! Form::open() !!}
            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                {!! Form::text('pesquisar', null, ['class' => 'form-control', 'placeholder' => 'Pesquisar e capturar']) !!}
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-2 col-lg-2 col-sm-3">
                    {!! Form::submit('Pesquisar e capturar', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="container">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		@if($artigos->count())
			<ul>
			@foreach($artigos as $artigo)
				<li><a href="{{ $artigo->link }}" target="_blank">{{ $artigo->titulo }}</a></li>
			@endforeach
			</ul>
		@endif
	</div>
</div>
@stop


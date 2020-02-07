@if ($errors->any())
	<div style="margin-bottom: 0px !important" class="alert alert-dismissable alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{!! $error !!}</li>
			@endforeach
		</ul>
	</div>
@endif

@if (Session::has('ok'))
	<div style="margin-bottom: 0px !important" class="alert alert-dismissable alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<span class="glyphicon glyphicon-thumbs-up"></span>
		{!! Session::get('ok') !!}
	</div>
@endif

@if (Session::has('info'))
	<div style="margin-bottom: 0px !important" class="alert alert-dismissable alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<span class="glyphicon glyphicon-info-sign"></span>
		{!! Session::get('info') !!}
	</div>
@endif

@if (Session::has('warning'))	
	<div style="margin-bottom: 0px !important" class="alert alert-dismissable alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<span class="glyphicon glyphicon-warning-sign"></span>
		{!! Session::get('warning') !!}
	</div>
@endif

@if (Session::has('error'))
	<div style="margin-bottom: 0px !important" class="alert alert-dismissable alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<span class="glyphicon glyphicon-thumbs-down"></span>
		{!! Session::get('error') !!}
	</div>
@endif
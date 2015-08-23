@extends('app')
@section('content')
<H1 class="page-heading">Create a Contribution</H1>
{!! Form::open(['method'=>'GET', 'action'=>'ContributionsController@confirm']) !!}
<div class="form-group">
	{!! Form::label('subject', 'Subject') !!}
	{!! Form::text('subject', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('contribution', 'Contribute Ideas Here!') !!}
	{!! Form::textarea('contribution', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Submit Contribution', ['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}

@if ($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
@endif
@endsection
@stop

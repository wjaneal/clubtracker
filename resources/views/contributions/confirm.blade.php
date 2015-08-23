@extends('app')
@section('content')
	<h1 class="page-heading">Confirm Contribution</h1>
	<h2 class="heading">Thank you, {{$data["name"]}}, for your contribution. Please verify before confirming.</h2>
	{!!Form::open(['action'=>'ContributionsController@store'])!!}
	<div class="form-group">
		{!!Form::label('subject','Subject:' )!!}
		{!!Form::text('subject', $data['subject'],['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('contribution','Ideas:' )!!}
		{!!Form::textarea('contribution', $data['contribution'],['class'=>'form-control'])!!}
	</div>

  {!! Form::submit('Submit Contribution', ['class'=>'btn btn-primary form-control']) !!}
	{!!Form::close()!!}
@endsection

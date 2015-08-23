@extends('app')
@section('content')
<H1>Welcome to the LIA Club Tracker</H1>

{!! Form::text('date', '', array('id' => 'datepicker') !!}
@endsection

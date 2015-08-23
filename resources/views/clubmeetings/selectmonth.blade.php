@extends('app')
@section('content')
<h1>Select Month and Club</h1>
{!!Form::open(['url'=>'setmeetings', 'method'=>'PUT'])!!}
{!!Form::select('year', $years)!!}
{!!Form::select('month', $months)!!}
<br>
{!!Form::select('clubid', $clubs)!!}
<br>
{!!Form::submit('Submit')!!}
{!!Form::close()!!}
@endsection

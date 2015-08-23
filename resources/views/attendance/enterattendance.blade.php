@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')

<h1>LIA Clubs - Enter Attendance </h1>
<h2>Date: {!!$date!!}</h2>
{!!Form::open(['url'=>'submitmultiple','method'=>'PUT'])!!}
<table class="table">
	<tr><th colspan="2">Student<th>Entry</tr>
	@foreach($enrolments as $enrolment)
		<tr>
		<td>{!!$enrolment->slname!!}</td>
		<td>{!!$enrolment->sfname!!}</td>
		<td>
			{!!Form::select('entry[]', $entries)!!}
			{!!Form::hidden('studentid[]', $enrolment->studentid)!!}
		 </td>
		</tr>
	@endforeach
	{!!Form::hidden('clubmeetingid', $clubmeetingid)!!}
</table>
{!!Form::submit('Enter Attendance')!!}
{!!Form::close()!!}
@endsection

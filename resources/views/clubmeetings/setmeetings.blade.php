@extends('app')
@section('content')
<h1>Set Club Meetings - {{$clubname}} - {{$month}}, {{$year}}</h1>

{!! Form::open(array('url' => 'storemany', 'method'=>'PUT')) !!}
{!! Form::hidden('clubid', $clubid)!!}
{!! Form::hidden('year', $year)!!}
{!! Form::hidden('month', $month)!!}
<table class="table">
	<tr><td>Sun.<td>Mon.<td>Tue.<td>Wed.<td>Thu.<td>Fri.<td>Sat.
	@foreach($weeks as $week)
		<tr>
		@foreach($week as $weekday)
			<td>
				<table>
					<tr><td>{{$weekday}}
					@if($weekday != '-')
						<tr><td>{!!Form::checkbox('meetingdate[]',$weekday)!!}
							{!!Form::select('start_time[]', $hour_select)!!}
							{!!Form::select('end_time[]', $hour_select)!!}
					@endif
				</table>
			</td>
		@endforeach
		</tr>
	@endforeach
</table>
{!!Form::submit('Submit Meeting Dates')!!}
{!! Form::close() !!}
@endsection

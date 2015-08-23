@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')


<h1>LIA Club Meetings</h1>
<table class="table">
	<tr><th>Meeting Date<th>Club<th>Start Time<th>End Time<th>Show or Edit
	@foreach($clubmeetings as $clubmeeting)
		<tr>
		<td>{{$clubmeeting->meetingdate}}</td>
		<td>{{$clubs[$clubmeeting->clubid]}}</td>
		<td>{{$clubmeeting->start_time}}</td>
		<td>{{$clubmeeting->end_time}}</td>
		<td>
 			<!-- show or edit the clubmeeting -->
                	<a class="btn btn-small btn-success" href="{{ URL::to('clubmeetings/' . $clubmeeting->id) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('clubmeetings/' . $clubmeeting->id . '/edit') }}">Edit</a>
		</td>
		</tr>
	@endforeach
</table>
@endsection

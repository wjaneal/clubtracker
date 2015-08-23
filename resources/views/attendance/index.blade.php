@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')

<H1>LIA Club Attendance</H1>
<table class="table">
	<tr><th>Club<th>Student<th>Date<th>Entry<th>Show or Edit
	@foreach($attendance as $a)
		<tr>
		<td>{{$clubs[$clubmeetings[$a['clubmeetingid']]]}}</td>
		<td>{{$students[$a['studentid']]}}</td>
		<td>{{$dates[$a['clubmeetingid']]}}</td>
		<td>{{$a['entry']}}</td>
		<td>
 			<!-- show or edit the a -->
                	<a class="btn btn-small btn-success" href="{{ URL::to('attendance/' . $a['id']) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('attendance/' . $a['id'] . '/edit') }}">Edit</a>
		</td>
		</tr>
	@endforeach
</table>
@endsection

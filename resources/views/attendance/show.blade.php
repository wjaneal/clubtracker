@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')

<h1>LIA Club Attendance - Show Record </h1>
<table class="table">
	<tr><th>Club<th>Student<th>Date<th>Entry<th>Edit or Remove

		<tr>
		<td>{{$clubs[$attendance->clubid]}}</td>
		<td>{{$students[$attendance->studentid]}}</td>
		<td>{{$attendance->date}}</td>
		<td>{{$attendance->entry}}</td>
		<td>
 			<!-- show or edit the attendance -->
                	<a class="btn btn-small btn-info" href="{{ URL::to('attendance/' . $attendance->id.'/edit' ) }}">Edit</a>
		        {!!Form::open(['url'=>'attendance/'.$attendance->id.'', 'method'=>'DELETE'])!!}
    			{!!Form::submit('Delete Attendance', ['class'=>'btn btn-warning'])!!}
    			{!!Form::close()!!}
        
		</td>
		</tr>
</table>
@endsection

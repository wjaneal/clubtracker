@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')

<h1>LIA Club Enrolment - Show Record </h1>
<table class="table">
	<tr><th>Club<th>Student<th>Edit or Remove

		<tr>
		<td>{{$clubs[$enrolment->clubid]}}</td>
		<td>{{$students[$enrolment->studentid]}}</td>
		<td>
 			<!-- show or edit the enrolment -->
                	<a class="btn btn-small btn-info" href="{{ URL::to('enrolment/' . $enrolment->id.'/edit' ) }}">Edit</a>
		        {!!Form::open(['url'=>'enrolment/'.$enrolment->id.'', 'method'=>'DELETE'])!!}
    			{!!Form::submit('Delete Enrolment', ['class'=>'btn btn-warning'])!!}
    			{!!Form::close()!!}
        
		</td>
		</tr>
</table>
@endsection

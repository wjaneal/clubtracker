@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')


<h1>LIA Students</h1>
<table class="table">
	<tr><th>Last Name<th>First Name<th>Nickname<th>Grade<th>Show or Edit
	@foreach($students as $student)
		<tr>
		<td>{{$student->slname}}</td>
		<td>{{$student->sfname}}</td>
		<td>{{$student->snname}}</td>
		<td>{{$student->grade}}</td>
		<td>
 			<!-- show or edit the student -->
                	<a class="btn btn-small btn-success" href="{{ URL::to('students/' . $student->id) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('students/' . $student->id . '/edit') }}">Edit</a>
		</td>
		</tr>
	@endforeach
</table>
@endsection

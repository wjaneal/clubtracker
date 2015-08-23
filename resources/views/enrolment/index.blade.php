@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')


<h1>LIA Club Enrolment</h1>
<table class="table">
	<tr><th>Club<th>Student<th>Show or Edit
	@foreach($enrolment as $e)
		<tr>
		<td>{{$clubs[$e->clubid]}}</td>
		<td>{{$students[$e->studentid]}}</td>
		<td>
 			<!-- show or edit the enrolment -->
                	<a class="btn btn-small btn-success" href="{{ URL::to('enrolment/' . $e->id) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('enrolment/' . $e->id . '/edit') }}">Edit</a>
		</td>
		</tr>
	@endforeach
</table>
@endsection

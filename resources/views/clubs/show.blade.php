@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')

<h1>LIA Clubs - Show</h1>
<table class="table">
	<tr><th>Name<th>Description<th>Teacher<th>Edit
		<tr>
		<td>{{$club['name']}}</td>
		<td>{{$club['description']}}</td>
		<td>{{$club['teacherid']}}</td>
		<td>
 			<!-- edit the club -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('clubs/' . $club->id . '/edit') }}">Edit</a>
		</td>
		</tr>
</table>
@endsection

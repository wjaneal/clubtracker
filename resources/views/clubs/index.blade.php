@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')

<h1>LIA Clubs - Teacher - {!!$teacher!!} </h1>
<table class="table">
	<tr><th>Name<th>Description<th>Teacher<th>Show or Edit
	@foreach($clubs as $club)
		<tr>
		<td>{{$club->name}}</td>
		<td>{{$club->description}}</td>
		<td>{{$teacher}}</td>
		<td>
 			<!-- show or edit the budget -->
                	<a class="btn btn-small btn-success" href="{{ URL::to('clubs/' . $club->id) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('clubs/' . $club->id . '/edit') }}">Edit</a>
		</td>
		</tr>
	@endforeach
</table>
@endsection

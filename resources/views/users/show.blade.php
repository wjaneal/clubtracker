@extends('app')

@section('content')

<h1>LIA Users - Show </h1>
<table class="table">
	<tr><th>Name<th>Email<th>Department<th>Role<th>Show or Edit
	@foreach($users as $user)
		<tr>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->departmentid}}</td>
		<td>{{$user->role}}</td>
		<td>
 			<!-- show or edit the budget -->
                	<a class="btn btn-small btn-success" href="{{ URL::to('users/' . $user->id) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit</a>
		</td>
		</tr>
	@endforeach
</table>
@endsection

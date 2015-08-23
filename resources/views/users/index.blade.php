@extends('app')

@section('content')
<H1>System Users</H1>
<table class="table">
	<tr><th>Name<th>Email<th>Department<th>Role<th>Show or Edit
@foreach($users as $user)
	<tr>
	<td>{{$user->name}}
	<td>{{$user->email}}
	<td>{{Config::get('Globals.departments')[$user->departmentid]}}
	<td>{{Config::get('Globals.user_types')[$user->type]}}
 	<td>
                <!-- show or edit the budget -->
                <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $user->id) }}">Show</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit</a>
        </td>

	</tr>
@endforeach
</table>
@endsection

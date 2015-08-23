@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')


<h1>LIA Budget - {{Config::get('Globals.departments')[$budgets[0]["departmentid"]]}} Department</h1>
<table class="table">
	<tr><th>Category<th>Subcategory<th>Amount<th>Department<th>Start Date<th>Show or Edit
	@foreach($budgets as $budget)
		<tr>
		<td>{{$budget->category}}</td>
		<td>{{$budget->subcategory}}</td>
		<td>{{$budget->amount}}</td>
 		<td>{{Config::get('Globals.departments')[$budget->departmentid]}}
		<td>{{$budget->startdate}}</td>
		<td>
 			<!-- show or edit the budget -->
                	<a class="btn btn-small btn-success" href="{{ URL::to('budgets/' . $budget->id) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('budgets/' . $budget->id . '/edit') }}">Edit</a>
		</td>
		</tr>
	@endforeach
</table>
@endsection

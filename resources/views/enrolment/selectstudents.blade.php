@extends(Auth::user()->type=='0' ? 'app':'staff')
@section('content')
<h1>Enrol Students:</h1>
    {!!Form::open(['url'=>'submitenrolments','method'=>'PUT'])!!}
    {!!Form::select('clubid[]', $clubs)!!}
    <table class="table">
    @foreach($students as $student)
	<tr>
		<td>{!!$student->slname!!}
		<td>{!!$student->sfname!!}
		<td>{!!Form::checkbox('studentid[]', $student->id)!!}
	</tr>
    @endforeach
    </table>
    {!!Form::submit('Enrol Checked Students')!!}
@endsection

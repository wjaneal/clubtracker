@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')
<H1>Edit a Student Club Attendance Record:</H1>
    {!! form($attendanceForm) !!}
<H2>Delete Student Attendance:</H2>
    {!!Form::open(['url'=>'attendance/'.$id.'', 'method'=>'DELETE'])!!}
    {!!Form::submit('Delete Attendance', ['class'=>'btn btn-warning'])!!}
    {!!Form::close()!!}
@endsection

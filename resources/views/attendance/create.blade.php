@extends(Auth::user()->type=='0' ? 'app':'staff')
@section('content')
<h1>Create an Attendance Entry:</h1>
    {!! form($attendanceForm) !!}
@endsection

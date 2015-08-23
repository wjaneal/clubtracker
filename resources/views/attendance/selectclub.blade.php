@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')

<h1>LIA Club Attendance - Select Club </h1>
{!!Form::open(['url'=>'enterattendance','method'=>'PUT'])!!}
{!!Form::select('clubid', $clubs)!!}
{!!Form::submit('Select Club')!!}
{!!Form::close()!!}
@endsection

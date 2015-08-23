@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')
<H1>Edit a Student Club Enrolment:</H1>
    {!! form($enrolmentForm) !!}
<H2>Delete Student Enrolment:</H2>
    {!!Form::open(['url'=>'enrolment/'.$id.'', 'method'=>'DELETE'])!!}
    {!!Form::submit('Delete Enrolment', ['class'=>'btn btn-warning'])!!}
    {!!Form::close()!!}
@endsection

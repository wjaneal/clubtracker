@extends(Auth::user()->type=='0' ? 'app':'staff')
@section('content')
<h1>Register a New Student</h1>
    {!! form($studentForm) !!}
@endsection

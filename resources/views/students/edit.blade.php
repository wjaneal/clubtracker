@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')
<H1>Edit a Student Record:</H1>
    {!! form($studentForm) !!}
@endsection

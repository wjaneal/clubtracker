@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')
<H1>Edit a Club:</H1>
    {!! form($clubForm) !!}
@endsection

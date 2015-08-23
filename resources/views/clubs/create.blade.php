@extends(Auth::user()->type=='0' ? 'app':'staff')
@section('content')
<h1>Create a New Club:</h1>
    {!! form($clubForm) !!}
@endsection

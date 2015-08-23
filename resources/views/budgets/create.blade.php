@extends(Auth::user()->type=='0' ? 'app':'staff')
@section('content')
<h1>Create a Budget Line:</h1>
    {!! form($budgetForm) !!}
@endsection

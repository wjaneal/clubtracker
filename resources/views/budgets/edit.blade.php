@extends(Auth::user()->type=='0' ? 'app':'staff')

@section('content')
<H1>Edit a Budget Line:</H1>
    {!! form($budgetForm) !!}
@endsection

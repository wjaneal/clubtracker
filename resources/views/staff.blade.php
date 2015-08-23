  <head>      
        <meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
        <title>
  LIA Club Tracker
        </title>
   <link href="{{asset('css/all.css')}}" rel="stylesheet">
    </head>
    <body>
        @include("header_admin")
        <div class="content">
            <div class="container">
			@if(Session::has('flash_message'))
				<div class="alert alert-success">{{Session::get('flash_message')}}</div>
			@endif
                @yield("content")
            </div>
        </div>
        @include("footer")
    </body>
</html>


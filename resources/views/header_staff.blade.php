@section("header")
    <div class="header">
        <div class="container">
                <img src={{asset('tight.jpg')}} width = 10%></img>
            <h1>LIA Expenses Tracker</h1>

            @if (Auth::check())
                <div class="navbar navbar-inverse">
                        <ul class="nav navbar-nav">
                         	<li><a href="{{URL::to('expenditures')}}">View Expenditures</a></li>
				<li><a href="{{URL::to('expenditures/create')}}">Enter an Expenditure</a></li>
                        	</ul>
			</div>
                <a href="{{URL::to('auth/logout')}}">
                    logout
                </a>
                |
                <a href="{{ base_path() }}">
                    profile
                </a>

            @else
                <div class="navbar navbar-inverse">
                        <ul class="nav navbar-nav">
                                <li><a href="{{URL::to('auth/login')}}">Login</a></li>
                                <li><a href="{{URL::to('auth/register')}}">Register</a></li>

                        </ul>
              </div>
            @endif
        </div>
    </div>
@show


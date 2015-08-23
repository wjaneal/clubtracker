@section("header")
    <div class="header">
        <div class="container">
                <img src={{asset('tight.jpg')}} width = 10%></img>
            <h1>LIA Club Tracker</h1>

            @if (Auth::check())
                <div class="navbar navbar-inverse">
                        <ul class="nav navbar-nav">
                                <li><a href="{{URL::to('students')}}">Students</a></li>
				<li><a href="{{URL::to('students/create')}}">New Student</a></li>
                         	<li><a href="{{URL::to('clubs')}}">Clubs</a></li>
				<li><a href="{{URL::to('clubs/create')}}">New Club</a></li>
                         	<li><a href="{{URL::to('clubmeetings')}}">Club Meetings</a></li>
				<li><a href="{{URL::to('selectmonth')}}">Set Meetings</a></li>
                         	<li><a href="{{URL::to('selectclub')}}">Attendance</a></li>
				<li><a href="{{URL::to('selectstudents')}}">Club Enrolment</a></li>
				<li><a href="{{URL::to('auth/logout')}}">Logout</a></li>
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


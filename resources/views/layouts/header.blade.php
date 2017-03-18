<div class="header">
    <div class="container">
        <div class="row">
            <div class="navbar-header col-md-6 col-xs-6">
	            <a class="" href="/">
	                <img alt="Brand" src="/img/logo.png" width="75" height="75">
	            </a>
	            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <h1 style="display: inline;">
                    &nbsp;&nbsp;NUS Eat
                </h1>
            </div>
            <div class="col-md-6 col-xs-6">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="/">Home</a></li>
                    @if (Auth::guest())
                        <li role="presentation"><a href="{{ route('register') }}">Sign Up</a></li>
                        <li role="presentation"><a href="{{ route('login') }}">Log In</a></li>
                    @elseif (Auth::check())
                        <li role="presentation">
                            <a href="{{ route('user.profile') }}">Profile</a>
                        </li>
                        <li role="presentation">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-6">
                <h1>
                    NUS Eat
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

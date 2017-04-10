<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">NUS Food</a>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Hamburger Navbar -->

            <ul class="nav navbar-nav">
                <li role="presentation" class="active"><a href="/">Home</a></li>
                <li><a role="presentation" href="/foods">Menu</a></li>
                <li><a role="presentation" href="/orders">Orders</a></li>
                @if (Auth::guest())
                    <li role="presentation"><a href="{{ route('register') }}">Sign Up</a></li>
                    <li role="presentation"><a href="{{ route('login') }}">Log In</a></li>

                @elseif (Auth::check())
                    <li role="presentation">
                        <a class="collapsed" data-toggle="collapse" data-target="#user_collapse">
                            User <span class="caret"></span>
                        </a>
                        <div class="collapse" id="user_collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="/profile/<?php echo Auth::user()->id ?>">Profile</a> </li>
                                <li><a role="presentation" href="/threads">Messages <span class="label label-danger label-as-badge">{{ App\Thread::get_total_unread(Auth::user()->id) }}</span></a></li>
                                <li><a role="presentation" href="/cart">Cart</a></li>
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
                            </ul>
                        </div>
                    </li>

                @endif
            </ul>



        </div>
    </div>
</nav>

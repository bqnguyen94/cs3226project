<div class="header">
    <nav class="navbar-default" role="navigation"  style="background-color:transparent; border">
        <div class="container">
            <div class="navbar-header">
                <a class="" href="/">
	                <img alt="Brand" src="/img/logo.png" width="75" height="75">
	            </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
	            <h1 style="display: inline;">
                    &nbsp;&nbsp;NUS Food
                </h1>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="/food">Menu</a></li>
                    <li><a role="presentation" href="/orders">Orders</a></li>
                    @if (Auth::guest())
                        <li role="presentation"><a href="{{ route('register') }}">Sign Up</a></li>
                        <li role="presentation"><a href="{{ route('login') }}">Log In</a></li>
                        <!--<li class="dropdown" id="dropdown_optionsbeforelogin" role="presentation" >
							            <a role="presentation" class="dropdown-toggle" data-toggle="dropdown">Options <span class="caret"></span></a>
							            <ul class="dropdown-menu">
								            <li><a role="presentation" href="/foods">Menu</a></li>
								            <li><a role="presentation" href="/orders">Orders</a></li>
							            </ul>
						           </li> -->
                    @elseif (Auth::check())
						<li class="dropdown" id="dropdown_user" role="presentation"  >
							<a role="presentation" class="dropdown-toggle" data-toggle="dropdown">User <span class="caret"></span></a>
                        	<ul class="dropdown-menu">
								<li><a href="/profile/<?php echo Auth::user()->id ?>">Profile</a> </li>
								<li><a role="presentation" href="/threads">Message</a></li>
								<li><a role="presentation" href="/cart">Cart</a></li>
							</ul>
						</li>
             			<!--<li class="dropdown" id="dropdown_options" role="presentation" >
							<a role="presentation" class="dropdown-toggle" data-toggle="dropdown">Options <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a role="presentation" href="/foods">Menu</a></li>
<!-- Temporary removed in case we missed something <li><a role="presentation" href="/cart">Cart</a></li>
								<li><a role="presentation" href="/orders">Orders</a></li>
							</ul>
						</li> -->
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
        </nav>
    </div>
</div>

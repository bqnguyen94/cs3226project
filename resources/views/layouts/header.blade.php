<div class="header">
    <div class="container">
        <div class="row">
            <div class="navbar-header col-md-4 col-xs-4">
	            <a class="" href="/">
	                <img alt="Brand" src="/img/logo.png" width="75" height="75">
	            </a>
	            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <h1 class="hidden-xs hidden-sm" style="display: inline;">
                    &nbsp;&nbsp;NUS Food
                </h1>
            </div><br>
            <div class="col-md-12 col-xs-12" style="background-color:#d8192f; margin-top:50px; ">
                <ul class="nav nav-pills">
                    <li role="presentation" ><a href="/">Home</a></li>
                    @if (Auth::guest())
                       
					<li role="presentation"><a href="/foods">Menu</a></li>
					<li role="presentation"><a href="/orders">Orders</a></li>
					<li role="presentation" style="float:right"><a href="{{ route('login') }}">Log In</a></li>
					<li role="presentation" style="float:right"><a href="{{ route('register') }}">Sign Up</a></li>
                    		         
						           
                    @elseif (Auth::check())
				
				    <li role="presentation"><a href="/foods">Menu</a></li>
					<li role="presentation"><a href="/orders">Orders</a></li>
					
					<li role="presentation" style="float:right">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    </li>
				<li class="dropdown" id="dropdown_user" role="presentation" style="float:right" >
							<a role="presentation" class="dropdown-toggle" data-toggle="dropdown">User <span class="caret"></span></a>
                        	<ul class="dropdown-menu">
								<li><a href="/profile/<?php echo Auth::user()->id ?>">Profile</a> </li>
								<li><a role="presentation" href="/threads">Message</a></li>
								<li><a role="presentation" href="/cart">Cart</a></li>
							</ul>
					</li>
				
					
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="container row" style="height: 40px">
<!--
	
    @if (Auth::check())
    <div class="row" >
    	<div class="col-md-6 menue"><ul><li><a href="/foods">Get Food</a></li></ul></div>
    	<div class="col-md-6 menue"><ul><li><a href="/orders">Get Order</a></li></ul></div>
    </div>
    @endif
-->
    </div>

</div>

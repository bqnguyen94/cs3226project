<div id="vn" class="outerVN">
    <div  class="verticalNav">
            <br>
            <h3>NUSFood Guideline:</h3>
            <br>
            <h4>To Order</h4>
            <h4>1. Menu</h4>
            <h5>    add dish to cart</h5>
            <h4>2. Cart</h4>
            <h5>    place order,or continue shopping</h5>
            <h4>3. Order</h4>
            <h5>    accept price</h5>
            <h4>4. Set order as received</h4>
            <br>
            <h4>To deliver</h4>
            <h4>1. Orders</h4>
            <h5>    choose one order to make a deliver</h5>
            <h4>2. Make an offer</h4>
            <h5>    Price your own deliver</h5>
            <h4>3. Chat with buyer</h4>
            <h5>    show message bar</h5>
            <h4>4. Send and confirm food sent</h4>
    </div>
</div>

<div id="hd" class="header">
    <div class="container">
        <div class="row">
            <div class="navbar-header col-md-4 col-xs-4">
	            <a class="" href="/">
	                <img alt="Brand" src="/img/logo.jpg" width="75" height="75">
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
            </div>
            <div class="col-md-12 col-xs-12" style="margin-top: 30px">
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
								<li><a role="presentation" href="/threads">Messages <span class="label label-danger label-as-badge">{{ App\Thread::get_total_unread(Auth::user()->id) }}</span></a></li>
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

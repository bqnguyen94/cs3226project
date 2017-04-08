@extends('layouts.template')
@section('main')

<div class="container">
	
	<ul>
	
		<li><a href="#help_signup">Sign up</a></li>
		<li><a href="#help_login">Login</a></li>
		<li><a href="#help_ordering">Buying food</a></li>
		<li>Check Order</li>
		<li>To be continued...</li>
	
	</ul>
	



	<section id="help_signup" class="col-sm-8" >
		<h1>Sign up</h1>
		<p>First sign up by keying in your nus email address and a valid password. A verification email will be sent to you shortly. Once you have verified your account, you are free to order food and make offers to delivery.</p>
		<img src="/img/help/signup.png">

	</section>

	<section id="help_login" class="col-sm-8" >
		<h1>Login</h1>
		<p>Login with the email address and the password that you used to sign up previously.</p>
		<img src="/img/help/login.png">

	</section>
	
	<section id="help_ordering" class="col-sm-8" >
		<h1>Buying food</h1>
		<p>First you have to sign in to your account before ordering, otherwise you will be redirected to the login page again.</p>
		<br>
		<p>First go to the menu, then choose a location: Utown, the Deck, Business Canteen, Yusof Ishak House, or the Science Canteen.</p>
		<br>
		<p>Then choose food from a restaurant currently available and press add to cart.</p>
		<img src="/img/help/help_menu.png">
		<br>
		<p>After clicking add to cart, you are automatically redirected to the cart site. Here you can check food you have already ordered press pay order to finalise. Otherwise, you can press return to food menu to add another item. Please key in your location, so that deliverers can decide whether your current location is convenient.</p>
		<img src="/img/help/help_cart.png">
		<p>Once you have pressed you will be redirected to the order page below. Even though the current delivery location is fixed, you can later try to communicate your new location to deliverers once they make an offer. </p>
		<img src="/img/help/help_order.png">

	</section>

	

</div>

@endsection

<style>

section img{
	height:460px;
	width=750px;
	
	}
</style>

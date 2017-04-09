@extends('layouts.template')


<style>

div section img{
	max-height:360px;
	max-width:450px;
	border: 1px solid black;
	margin-left:100px;
	margin-top:50px;
	margin-bottom:50px;
	
}
	
body{
			background-image: url('/img/profile_background.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: right bottom; 
			
		}
		
p{
		word-spacing:0.30em;
		 line-height: 150%;
		
		}
	
.help{
		background-color: rgba(242, 254, 251, 0.75);
		
}
	
div.help_section section{
	
	margin 50px 50px 50px 50px;
	padding-left:100px;
}

</style>


@section('main')

<div class="help container">
	
	
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<ol id="help_menu" >

			<li><a href="#help_signup">Sign up</a></li>
			<li><a href="#help_login">Login</a></li>
			<li><a href="#help_ordering">Buying food</a></li>
			<li><a href="#help_chat">Chat</a></li>
			<li><a href="#help_order">Order: to deliver</a></li>
			<li><a href="#help_order2">Order: to accept price</a></li>

		</ol>
	</div>
<div class="col-sm-4"></div>
<br>
	
	
	<div class="help_section col-sm-10">

	<section id="help_signup" >
		<h1>Sign up</h1>
		<p>Sign up with your nus email address and a valid password. A verification email will be sent to you shortly. Once you have verified your account, you are free to order food and make offers to delivery.</p>
		<img src="/img/help/signup.png">

	</section>

	<section id="help_login" >
		<h1>Login</h1>
		<p>Login with the email address and the password that you used to sign up previously.</p>
		<img src="/img/help/login.png">

	</section>
	
	<section id="help_ordering"  >
		<h1>Buying food</h1>
		<p>First sign in to your account, otherwise you will be redirected to the login page.</p>
		<br>
		<p>Go to the menu, then choose a location: Utown, the Deck, Business Canteen, Yusof Ishak House, or the Science Canteen.</p>
		<br>
		<p>Choose food from a restaurant currently available and press add to cart.</p>
		<img src="/img/help/help_menu.png">
		<br>
		<p>After clicking add to cart, you are automatically redirected to the cart site. Here you can check food you have already ordered, fill in your delivery location and press place order. Otherwise, you can press return to food menu to add another item. </p>
		<img src="/img/help/help_cart.png">
		<p>Once you have pressed you will be redirected to the order page below. Even though the current delivery location is fixed, you can later try to communicate your new location to deliverers if they tried to send you a message (see the next section). </p>
		<img src="/img/help/help_order.png">

	</section>
	
	<section id="help_chat"  >
		<h1>Chat</h1>
		<p>To use chat, you must have an account. Please <a href="/register">sign up</a> first.</p>
		<img src="/img/help/help_message.png">
		<br>
		<p>Chat function is for user to negotiate with the deliverer the price for delivering food to a location.</p>
		<p>You can also use the chat with admin function to message admin on issues and we'll reply you back.</p>

	</section>
	
	<section id="help_order" >
		<h1>Order: to deliver</h1>
		<p>Login in an account and go to the <a href="/order">order</a> screen. Click on details.</p>
		<img src="/img/help/help_order2.png">
		<br>
		<p>Click on chat to talk to buyer on where exactly the delivery place is at, and whether your price of offer is acceptable. Then fill in price at Make an offer. The offer must be round to the nearest 10 cents.</p>
		<img src="/img/help/help_makeOffer.png">
		<p>After you've made the offer, it should appear below at This order's offers. You should wait for buyer to confirm before making the actual purchase. </p>
		<img src="/img/help/help_makeOffer2.png">

	</section>
	
	<section id="help_order2" >
		<h1>Order: to accept price</h1>
		<p>After placing order for a while, check the offer you have already made at your profile page.</p>
		<img src="/img/help/help_checkOffer.png">
		<p>After clicking on the date, you will be redirected to order below. Press accept offer if the price is right. Note that the price can be much higher than the original price of food as it include deliverer's fees. Click on chat to renegotiate the price or if you choose to accept another offer and want to reject a previous offer.</p>
		<img src="/img/help/help_acceptOffer.png">
		<br>
		
		
	</section>

	</div>
	

</div>

@endsection

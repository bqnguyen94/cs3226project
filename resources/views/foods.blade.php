@extends('layouts.template')
@section('main')
<!-- self note: remove link and place in navbar/template later -->


<head>
	<link href="https://fonts.googleapis.com/css?family=Acme|Belleza|Vollkorn" rel="stylesheet"> 
	
</head>
<body>
<div id="menu_heading_background" class="col-xs-12">

	 <p id="menu_heading" >Menu</p>
			
</div>
	
	
<div class="container">
    <h1>Choose the Location:</h1>
    <div class="row">

	    <div class="panel-group">
	  		<div class="panel panel-warning">
	    		<div class="panel-heading">
	      			<h4 class="panel-title">
	        			<a data-toggle="collapse" href="#collapse1">University Town</a>
	      			</h4>
	    		</div>
	    		<div id="collapse1" class="panel-collapse collapse">
	    			<?php $hasRes=false; ?>
	      			@foreach ($restaurants as $restaurant)
            		<?php 
            			if($restaurant->location=="Universiv Town"){
            				$hasRes=true;
            		?>		
            				@include('_restaurant_panel')
            		<?php  
            			}
            		?>
        			@endforeach
        			<?php 
        			if($hasRes==false){
        			?>
        				<h5>&nbsp;&nbsp;&nbsp;&nbsp;No restaurant available yet!</h5>	
        			<?php 
        			}
        			 ?>
	    		</div>
	  		</div>
		</div>

		<div class="panel-group">
	  		<div class="panel panel-warning">
	    		<div class="panel-heading">
	      			<h4 class="panel-title">
	        			<a data-toggle="collapse" href="#collapse2">The Deck</a>
	      			</h4>
	    		</div>
	    		<div id="collapse2" class="panel-collapse collapse">
	    			<?php $hasRes=false; ?>
	    			@foreach ($restaurants as $restaurant)
            		<?php 
            			if($restaurant->location=="The Deck"){
            				$hasRes=true;
            		?>
            				@include('_restaurant_panel')
            		<?php  
            			}
            		?>
        			@endforeach
        			<?php 
        			if($hasRes==false){
        			?>
        				<h5>&nbsp;&nbsp;&nbsp;&nbsp;No restaurant available yet!</h5>	
        			<?php 
        			}
        			 ?>	
	    		</div>
	  		</div>
		</div>

		<div class="panel-group">
	  		<div class="panel panel-warning">
	    		<div class="panel-heading">
	      			<h4 class="panel-title">
	        			<a data-toggle="collapse" href="#collapse3">Biz Canteen</a>
	      			</h4>
	    		</div>
	    		<div id="collapse3" class="panel-collapse collapse">
	    			<?php $hasRes=false; ?>
	      			@foreach ($restaurants as $restaurant)
            		<?php 
            			if($restaurant->location=="Biz Canteen"){
            				$hasRes=true;
            		?>		
            				@include('_restaurant_panel')
            		<?php  
            			}
            		?>
        			@endforeach
        			<?php 
        			if($hasRes==false){
        			?>
        				<h5>&nbsp;&nbsp;&nbsp;&nbsp;No restaurant available yet!</h5>	
        			<?php 
        			}
        			 ?>
	    		</div>
	  		</div>
		</div>

		<div class="panel-group">
	  		<div class="panel panel-warning">
	    		<div class="panel-heading">
	      			<h4 class="panel-title">
	        			<a data-toggle="collapse" href="#collapse4">Yusof Ishak House</a>
	      			</h4>
	    		</div>
	    		<div id="collapse4" class="panel-collapse collapse">
	    			<?php $hasRes=false; ?>
	      			@foreach ($restaurants as $restaurant)
            		<?php 
            			if($restaurant->location=="Yusof Ishak House"){
            				$hasRes=true;
            		?>		
            				@include('_restaurant_panel')
            		<?php  
            			}
            		?>
        			@endforeach
        			<?php 
        			if($hasRes==false){
        			?>
        				<h5>&nbsp;&nbsp;&nbsp;&nbsp;No restaurant available yet!</h5>	
        			<?php 
        			}
        			 ?>
	    		</div>
	  		</div>
		</div>

		<div class="panel-group">
	  		<div class="panel panel-warning">
	    		<div class="panel-heading">
	      			<h4 class="panel-title">
	        			<a data-toggle="collapse" href="#collapse5">Science Canteen</a>
	      			</h4>
	    		</div>
	    		<div id="collapse5" class="panel-collapse collapse">
	    			<?php $hasRes=false; ?>
	      			@foreach ($restaurants as $restaurant)
            		<?php 
            			if($restaurant->location=="Science Canteen"){
            				$hasRes=true;
            		?>		
            				@include('_restaurant_panel')
            		<?php  
            			}
            		?>
        			@endforeach
        			<?php 
        			if($hasRes==false){
        			?>
        				<h5>&nbsp;&nbsp;&nbsp;&nbsp;No restaurant available yet!</h5>	
        			<?php 
        			}
        			 ?>
	    		</div>
	  		</div>
		</div>
    </div>
</div>
@endsection
	
<style>
	#menu_heading_background{
				
		background-image:url("http://139.59.104.3/img/banner/banner_menu2.png");
		width:100%;
		max-height:140px;
		min-height:105px;
		margin-bottom:40px;
	}

	
	#menu_heading{
		
		padding-top:20px;
		text-align:50%;
		font-size:48px;
		text-align:center;
		color:white;
		font-weight:900;
		font-family:'Belleza', sans-serif;
		text-shadow:2px 2px black;
		
		
		
	}

</style>
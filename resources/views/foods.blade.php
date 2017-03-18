@extends('layouts.template')
@section('main')
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

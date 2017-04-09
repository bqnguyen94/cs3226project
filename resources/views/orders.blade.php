@extends('layouts.template')
@section('main')


<head>
	<link href="https://fonts.googleapis.com/css?family=Acme|Belleza|Vollkorn" rel="stylesheet"> 
	
</head>
<body>
<div id="order_heading_background" class="col-xs-12">

	 <p id="order_heading" >Orders</p>
			
</div>
	
	
<div class="container">
    <div class="row">
        @foreach ($orders as $order)
            @if ($order->deliverer_id == null)
                @include('_order_card')
            @endif
        @endforeach
    </div>
</div>
@endsection

	
	
		
<style>
	#order_heading_background{
				
		background-image:url("/img/banner/banner_order.png");
		width:100%;
		max-height:140px;
		min-height:105px;
		margin-bottom:40px;
	}

	
	#order_heading{
		
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
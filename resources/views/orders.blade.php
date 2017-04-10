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

	

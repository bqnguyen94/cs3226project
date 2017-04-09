@extends('layouts.template')
@section('main')
<head>
	<link href="https://fonts.googleapis.com/css?family=Acme|Belleza|Vollkorn" rel="stylesheet">
</head>
<div id="cart_heading_background" class="col-xs-12">

	 <p id="cart_heading" >Cart</p>

</div>
<div class="container">
    <div class="row">

        <table class="table table-condensed">
            <thead id="cart_thead">
                <tr>
                    <th class="col-xs-1"></th>
                    <th class="col-xs-4">Item name</th>
                    <th class="col-xs-1">Price</th>
                    <th class="col-xs-1">Amount</th>
					 <th class="col-xs-1"></th>
					
                </tr>
            </thead>
            <tbody id="cart_tbody">
                <?php
                $i = 0;
                $user = Auth::user();
                $cart = $user->cart_get_foods();
                ?>
                @foreach ($cart as $cart_item)
                    <?php
                    $i++;
                    ?>
                    <tr class="cart_trow">
                        <td>{{ $i }}</td>
                        <td>{{ $cart_item['food']->name }}</td>
                        <?php

						$temp = $cart_item['food']-> price;
						$period = strpos($temp, ".");
						$length = strlen($temp);
						$temp2 =  $length-$period-1;
						if( $temp2 == 1){
							echo '<td>$' . $temp . '0</td>';
						}else {
							echo '<td>$' . $temp . '</td>';
						}
						?>

                        <td>{{ $cart_item['amount'] }} </td>
						<td>
							{!! Form::open(['route' => 'cart.delete']) !!}
							<button name="food_id" id="btn-submit" type="submit" class="btn btn-danger" value="<?php echo $cart_item['food_id'] ?>" style="width:24px;height:24px;padding:1px 1px 1px 1px; margin:1px 1px 1px 20px;">
							  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</button>
							{!! Form::close() !!}
							
							
						</td>
						
                    </tr>
                @endforeach

				<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
						<td></td>
						
                </tr>
                <tr id="cart_lastrow">
                    <td>
                        Total
                    </td>
                    <td>
                        ${{ $user->cart_get_total_price() }}
                    </td>
                    <td></td>
                    <td></td>
					<td></td>
					
                </tr>
				
				     <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
					<td>{!! Form::open(['route' => 'cart.clear']) !!}
						<center>
							<button name="food_id" id="cart_clearcart" type="submit" class="btn btn-danger glyphicon glyphicon-trash">
								Clear Cart 
							</button>


						</center>
						{!! Form::close() !!}</td>
						 
                	</tr>
            </tbody>
        </table>
		
    </div>

    <div class="row">
        {!! Form::open() !!}
            <div class="form-group">
                <div class="input-group col-xs-6">
                    <span class="input-group-addon" id="basic-addon2">Deliver to:</span>
                    <input id="location" name="location" type="text" class="form-control" placeholder="e.g: PGP Residence 4" required/>
                </div>
            </div>
            <center class="cart_buttons">
				<a href="/foods" class="btn btn-primary btn-lg" id="cart_continueshopping">Return to Food Menu</a>
				<button id="btn-submit" class="btn btn-primary btn-lg" type="submit">PLACE ORDER</button>

            </center>
        {!! Form::close() !!}
    </div>
</div>
</br></br>
@endsection

<style>

	#cart_heading_background{

		background-image:url("/img/banner/banner2.png");
		width:100%;
		max-height:140px;
		min-height:105px;
		margin-bottom:40px;
	}


	#cart_heading{

		padding-top:20px;
		text-align:50%;
		font-size:48px;
		text-align:center;
		color:white;
		font-weight:900;
		font-family:'Belleza', sans-serif;
		text-shadow:2px 2px black;



	}

	#cart_thead{

		font-size:20px;
		font-family: 'Belleza', sans-serif;
		font-weight:bold;

	}

	.cart_trow td{

		border-bottom:1pt solid #f2f2f2;

	}

	#cart_lastrow td{

		border-top:1pt solid #cccccc;
		border-bottom:1pt solid #cccccc;

	}

	#btn-submit{
		width:200px;
		height:65px;
	}

	#cart_continueshopping{
		width:200px;
		height:65px;
	}
	
	#cart_clearcart{
		width:150px;
		height:50px;
		padding:1px 1px 1px 1px; 
		margin:1px 1px 1px 20px;
		
	}
	
</style>

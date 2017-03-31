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
					<th class="col-xs-1">Delete</th>
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
                        <td>${{ $cart_item['food']->price }}</td>
                        <td><img src="img/icons/minus2.png"> {{ $cart_item['amount'] }} <img src="img/icons/plus2.png"></td>
						<td><img src="img/icons/close2.png"></td>
                    </tr>
                @endforeach

				<tr>
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
				<button id="btn-submit" class="btn btn-success" type="submit">PLACE ORDER</button>
				<a href="/foods" class="btn btn-success" id="cart_continueshopping">Continue Shopping</a>
            </center>
        {!! Form::close() !!}
    </div>
</div>
</br></br>
@endsection

<style>

	#cart_heading_background{

/*
		background-size:contain;
		background-repeat:no-repeat;
*/

		background-image:url("http://139.59.104.3/img/banner/banner2.png");
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
/*		color:#e40c25;*/
		font-family: 'Belleza', sans-serif;
		font-weight:bold;


	}

	#cart_tbody{

/*		color:#e40c25;*/

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

	#cart_cancel{
		padding-top:20px;
		width:200px;
		height:65px;
		font-size:16px;
	}

</style>

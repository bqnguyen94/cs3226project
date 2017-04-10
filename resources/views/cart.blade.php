@extends('layouts.template')
@section('link')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
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
                    <th class="col-xs-1"><center>Amount</center></th>
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
						<td>${{ number_format($cart_item['food']->price, 2) }}</td>
                        <td>
							<center>
								<span id="{{ $cart_item['food_id'] }}" class="amount-btn" aria-hidden="true" style="cursor: pointer; color: red;">+</span> <a style="text-decoration: none; color: black; cursor: default;">{{ $cart_item['amount'] }}</a> <span id="{{ $cart_item['food_id'] }}" class="amount-btn" aria-hidden="true" style="cursor: pointer; color: red;">-</span>
							</center>
						</td>
						<td>
							<center>
								{!! Form::open(['route' => 'cart.delete']) !!}
									<button name="food_id" id="btn-submit" type="submit" class="btn btn-danger" value="{{ $cart_item['food_id'] }}" style="width:24px;height:24px;padding:1px 1px 1px 1px; margin:1px 1px 1px 20px;">
									  	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</button>
								{!! Form::close() !!}
							</center>
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
            <!--todo add in datetime picker-->
	        <div class="container">
	            <div class="row">
	                <div class='col-sm-6'>
	                    <div class="form-group">
	                        <div class='input-group date' id='datetimepicker1'>
	                            <input type='text' class="form-control" />
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
            <div class="form-group">
                <div class="input_group col-xs-6">

                </div>
            </div>
            <center class="cart_buttons">
				<a href="/foods" class="btn btn-primary btn-lg" id="cart_continueshopping">Return to Food Menu</a>
				<button id="btn-submit" class="btn btn-success btn-lg po" type="submit">PLACE ORDER</button>

            </center>
        {!! Form::close() !!}
    </div>
</div>
</br></br>
@endsection
@section('script')
<script type="text/javascript" src="/js/cart.js"></script>
@endsection

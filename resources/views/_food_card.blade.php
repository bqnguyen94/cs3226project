<div class="card col-lg-3 col-md-3 col-xs-5 col-lg-offset-1 col-md-offset-1 col-xs-offset-1" style="margin-top: 30px">
    <!--Card image-->
    <div class="view overlay hm-white-slight">
        <img src="<?php echo $food->image ?>" class="img-fluid" alt="food">
        <a href="#">
            <div class="mask waves-effect waves-light"></div>
        </a>
    </div>
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-block">
        <!--Title-->
        <h4 class="card-title">{{ $food->name }}</h4>
        <!--Text-->
        <p class="card-text">Price:
			<?php

						$temp = $food-> price;
						$period = strpos($temp, ".");
						$length = strlen($temp);
						$temp2 =  $length-$period-1;
						if( $temp2 == 1){
							echo '$' . $temp . '0';
						}else {
							echo '$' . $temp;
						}
			?>

		</p>
        {!! Form::open() !!}
        <input id="food_id" name="food_id" type="hidden" value="<?php echo $food->id ?>">
        <button id="btn-submit" class="btn btn-success" type="submit">ADD TO CART</button>
        {!! Form::close() !!}
    </div>
    <!--/.Card content-->
</div>

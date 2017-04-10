<div class="card col-lg-3 col-md-3 col-xs-10 col-lg-offset-1 col-md-offset-1 col-xs-offset-1" style="margin-top: 30px">
    <!--Card image-->
    <div class="view overlay hm-white-slight">
        <img src="<?php echo $food->image ?>" class="img-fluid" alt="food" >
    </div>
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-block">
        <!--Title-->
        <h4 class="card-title">{{ $food->name }}</h4>
        <!--Text-->
        <p class="card-text">Price:
			<?php
				$price = $food-> price;
				echo '$' . number_format($price, 2);
			?>
		</p>
        {!! Form::open() !!}
        <input id="food_id" name="food_id" type="hidden" value="<?php echo $food->id ?>">
        <button id="btn-submit" class="btn btn-success" type="submit">ADD TO CART</button>
        {!! Form::close() !!}
    </div>
    <!--/.Card content-->
</div>

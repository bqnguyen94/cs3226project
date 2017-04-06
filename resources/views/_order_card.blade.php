<div class="card col-lg-3 col-md-3 col-xs-10 col-lg-offset-1 col-md-offset-1 col-xs-offset-1" style="margin-top: 30px">
    <!--Card image-->
    <div class="view overlay hm-white-slight">
        <img src="http://ghk.h-cdn.co/assets/cm/15/11/54fe25783596c-cajun-rice-chicken-orig-master-1.jpg" class="img-fluid" alt="order">
        <a href="#">
            <div class="mask waves-effect waves-light"></div>
        </a>
    </div>
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-block">
        <!--Title-->
        <h4 class="card-title">To: {{ $order->deliver_location }}</h4>
        <!--Text-->
        <p class="card-text">Price: ${{ $order->get_total_food_price() }}</p>
        <a href="/order/<?php echo $order->id ?>" class="btn btn-primary">Details</a>
    </div>
    <!--/.Card content-->
</div>

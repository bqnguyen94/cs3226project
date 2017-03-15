<div class="card col-lg-2 col-md-2 col-xs-3 col-lg-offset-1 col-md-offset-1 col-xs-offset-1" style="margin-top: 30px">
    <!--Card image-->
    <div class="view overlay hm-white-slight">
        <img src="http://ghk.h-cdn.co/assets/cm/15/11/54fe25783596c-cajun-rice-chicken-orig-master-1.jpg" class="img-fluid" alt="food">
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
        <p class="card-text">Price: {{ $food->price }}</p>
        <a href="#" class="btn btn-primary">Buy</a>
    </div>
    <!--/.Card content-->
</div>

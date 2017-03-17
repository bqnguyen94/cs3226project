@extends('layouts.template')
@section('main')
<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="/img/nus-sci-ayampenyet.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Never Queue For The Food You Love!</h1>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="/img/nus-art-chickenrice.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Lecture During Lunch Hour? No Worries!</h1>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="/img/nus-utown-astons.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Start Ordering From NUSEats Now!</h1>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    </a>
</div><!-- /.carousel -->
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <h1>
                    Order.
                </h1>
                <h1>
                    Help Out.
                </h1>
                <h1>
                    Get Paid.
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="section banner">
    <div class="container">
        <h3>No time to grab a lunch? Ask others for help!</h3>
        <a href="foods" class="btn">Get Started</a>
    </div>
</div>
<div class="section supporting">
    <div class="container">
        <div class="page-header">
            <h3>Newest Food Stalls</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4>
                    UTown
                </h4>
                <ul>
                    <li>Astons</li>
                    <li>Hwang's Korean Restaurant</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>
                    The Deck
                </h4>
                <ul>
                    <li>Liang Ban Kung Fu</li>
                    <li>Yong Tau Foo</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>
                    Yusof-Ishak House
                </h4>
                <ul>
                    <li>Starbucks</li>
                    <li>Old Chang Kee</li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection

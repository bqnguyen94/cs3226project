@extends('layouts.template')
@section('main')
<!-- Carousel
================================================== -->
<div class="container-fluid">
    <div class="row outer_block">
        <div class="col-md-7">
        <!--sidebar-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
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
        </div>
    </div>
        <div class="col-md-5 content_form">
            <div class="inner_block">
                <div class="tag_line">
                    NUSEats for busy students
                </div>
                <div class="msg">
                    Order food from your favourite local NUS food stall delivered by your fellow NUS friends!
                </div>
                <form>
                    <label >ENTER CANTEEN NAME</label>
                    <div>
                        <input type="text" autocomplete="off" id="canteen-select-input" placeholder="Science Canteen, UTown..." />
                        <button class="btn-primary btn" type="submit">Find Food</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
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

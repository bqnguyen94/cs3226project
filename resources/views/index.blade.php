@extends('layouts.template')
@section('main')
<!-- Carousel
================================================== -->
<div class="container-fluid">
  <div class="row outer_block">
    <div class="col-md-5 content_form" style="margin-bottom:50px;">
      <div class="inner_block">
        <div class="tag_line hidden-sm hidden-xs">
          NUS Food for Busy Students
        </div>
        <div class="msg">
          Order food from your favourite local NUS food stall delivered by your fellow NUS friends!
        </div>
        <form>
          <label >ENTER CANTEEN NAME</label>
          <div>
            <div style="display:flex;">
              <input style="height:69px;" type="text" autocomplete="off" id="canteen-select-input" placeholder="Science Canteen, UTown..." />
              <button id="find-button" class="btn btn-sm btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin '></i>" style="width:150px; margin-right:1px; margin-bottom:0px" type="submit button">Find Food</button>
            </div>
          </div>
        </form>
        <div class="suggestion-box" id="suggestion-box" style="display:none;">
          <ul>
            <li class="suggestions">
              Meh
            </li>
            <li class="suggestions">
              Moo
            </li>
          </ul>
        </div>

      </div>
    </div>
    <div class="col-md-7">
      <!--sidebar-->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <div class="img img1"></div>
            <div class="container">
              <div class="carousel-caption">
                <h1>Never Queue For The Food You Love!</h1>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="img img2"></div>
            <div class="container">
              <div class="carousel-caption">
                <h1>Lecture During Lunch Hour? No Worries!</h1>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="img img3"></div>
            <div class="container">
              <div class="carousel-caption">
                <h1>Start Ordering From NUS Food Now!</h1>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-md-offset-3">
      <!-- picture, comments -->
      <div class="container hidden-xs hidden-sm" style="height:250px;; width:auto;">
        <div class="img img4"></div>
      </div>
      <h3 style="height:100px;"><span style="display:block; font-weight:bold;">Order</span>
        <span style="display:block;">Your Food</span>
      </h3>
      <p style="display:block;">
        We support all the canteens in NUS and almost all the stalls in the Canteen! Just choose your canteen and food you want to eat!
      </p>
    </div>
    <div class="col-md-2">
      <div class="container hidden-xs hidden-sm" style="height:250px; width:auto;">
        <div class="img img2"></div>
      </div>
      <h3 style="height:100px;"><span style="display:block; font-weight:bold;">Help</span>
        <span style="display:block;">To Deliver</span>
      </h3>
      <p style="display:block;">
        Students can view the available orders placed by you and help to deliver the food right to your location!
      </p>
    </div>
    <div class="col-md-2">
      <div class="container hidden-xs hidden-sm" style="height:250px; width:auto;">
        <div class="img img3"></div>
      </div>
      <h3 style="height:100px;"><span style="display:block; font-weight:bold;">Get</span>
        <span style="display:block;">Paid For Your Efforts</span></h3>
        <p style="display:block;">
          Once food has been delivered, verify it on our website and get paid!
        </p>
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
</div>
@endsection

@section('script')
<script src="/js/search.js"></script>
@endsection

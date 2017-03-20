@extends('layouts.template')
@section('main')
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <a href = "{{url('yada')}}">hi</a>
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
        @if($order!=null)
            {{$order->id}}
            {{$order->buyer->id}}
            {{$order->deliverer->id}}
        @endif
        <h3>No time to grab a lunch? Ask others for help!</h3>
        <a href="#" class="btn">Learn More</a>
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

@extends('layouts.template')
@section('main')
    <?php
    $user = Auth::user();
    $buyer = App\User::where('id', $order->buyer_id)->first();
    $deliverer = App\User::where('id', $order->deliverer_id)->first();
    $offers = App\Offer::where('order_id', $order->id)->orderBy('price')->get();
    ?>
    <div class="container">
        {!! Form::open(['route'=>['order.buyer-feedback-validate',$order],'class'=>'form-horizontal']) !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                What is your feedback for order {{$order->id}}?
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('buyer_feedback','Feedback',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::textarea('buyer_feedback') !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('buyer_rating','Rate the Deliverer',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('buyer_rating',5,['class'=>'rating','id'=>'input-id','data-size'=>'lg'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-2">
                        <button id="btn-submit" type="submit" class="btn btn-success">
                            Submit feedback
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
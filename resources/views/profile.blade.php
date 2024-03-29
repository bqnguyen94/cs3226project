@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        <h2 style="text-align: center">This is {{ $target->name }}'s profile page</h2>
    </div>
    <br />
    @if (Auth::check() && Auth::user()->id == $target->id)
        {!! Form::open() !!}
        <div class="row">
            <div class="col-sm-6 col-xs-6">
                {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                <input class="form-control" name="name" type="text" value="<?php echo $target->name ?>" disabled>
            </div>
            <div class="col-sm-6 col-xs-6">
                {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                <input class="form-control" name="email" type="text" value="<?php echo $target->email ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-6">
                {!! Form::label('paypal', 'Paypal:', ['class' => 'control-label']) !!}
                <input class="form-control" name="paypal" type="email" value="<?php echo $target->paypal ?>" placeholder="Enter your paypal account">
            </div>
        </div>
        <center>
            <button id="btn-submit" class="btn btn-success" type="submit">UPDATE</button>
        </center>
        {!! Form::close() !!}
    @endif

    <?php
    $i=0; $total = 0;
    foreach($orders as $order){
        if($order->buyer_id==$target->id && $order->deliverer_rating){
            $i++;
            $total += $order->deliverer_rating;
        }
    }
    if($i!=0){
        $total = ($total/1.0)/$i;
    }
    ?>
    {!! Form::open(["method"=>"get"]) !!}
    <div class="row">
        <br>
        <br>
        {!! Form::label('deliverer_rating','Overall Rating as a Buyer',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('deliverer_rating',$total,
            ['class'=>'rating','id'=>'input-1',
            'data-show-clear'=>false,'data-show-caption'=>false,
            'data-readonly'=>true,'data-size'=>'sm'])!!}
        </div>
        <div class="col-sm-2">
            <br>
            <h4>
                {{$total}} stars
            </h4>
        </div>
    </div>
    {!! Form::close() !!}

    <?php
    $i=0; $total = 0;
    foreach($orders as $order){
        if($order->deliverer_id==$target->id && $order->buyer_rating){
            $i++;
            $total += $order->buyer_rating;
        }
    }
    if($i!=0){
        $total = ($total/1.0)/$i;
    }
    ?>
    <div class="row">
        <br>
        <br>
        {!! Form::label('buyer_rating','Overall Rating as a Deliverer',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('buyer_rating',$total,
            ['class'=>'rating','id'=>'input-1',
            'data-show-clear'=>false,'data-show-caption'=>false,
            'data-readonly'=>true,'data-size'=>'sm'])!!}
        </div>
        <div class="col-sm-2">
            <br>
            <h4>
                {{$total}} stars
            </h4>
        </div>
    </div>
</div>
<br/>
<div class="container">
    <div class="row">
        <h4>Buying history</h4>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="col-xs-1"></th>
                    <th class="col-xs-3">Date</th>
                    <th class="col-xs-1">Price</th>
                    <th class="col-xs-4">Deliverer</th>
                    <th class="col-xs-3">Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($orders as $order)
                    @if ($order->buyer_id == $target->id)
                        <?php
                        $i++;
                        $deliverer = $users->where('id', $order->deliverer_id)->first();
                        $price = $order->get_total_food_price();
                        ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td><a href="/order/<?php echo $order->id ?>">{{ $order->created_at }}</a></td>
                            <td>${{ $price }}</td>
                            @if ($deliverer)
                            <td><a href="/profile/<?php echo $deliverer->id ?>">{{ $deliverer->name }}</a></td>
                            @else
                            <td>No Deliverer</td>
                            @endif
                            <td>
                                {!! Form::text('deliverer_rating',$order->deliverer_rating,
            ['class'=>'rating',
            'data-show-clear'=>false,'data-show-caption'=>false,
            'data-readonly'=>true,'data-size'=>'xs'])!!}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br />
<div class="container">
    <div class="row">
        <h4>Tapao-ing history</h4>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="col-xs-1"></th>
                    <th class="col-xs-3">Date</th>
                    <th class="col-xs-1">Price</th>
                    <th class="col-xs-4">Buyer</th>
                    <th class="col-xs-3">Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($orders as $order)
                    @if ($order->deliverer_id == $target->id)
                        <?php
                        $i++;
                        $buyer = $users->where('id', $order->buyer_id)->first();
                        $price = $order->get_total_food_price();
                        ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td><a href="/order/<?php echo $order->id ?>">{{ $order->created_at }}</a></td>
                            <td>${{ $price }}</td>
                            <td><a href="/profile/<?php echo $buyer->id ?>">{{ $buyer->name }}</a></td>
                            <td>
                                {!! Form::text('buyer_rating',$order->buyer_rating,
            ['class'=>'rating',
            'data-show-clear'=>false,'data-show-caption'=>false,
            'data-readonly'=>true,'data-size'=>'xs'])!!}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

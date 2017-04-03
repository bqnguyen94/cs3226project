@extends('layouts.template')
@section('main')
    <?php
    $user = Auth::user();
    $buyer = App\User::where('id', $order->buyer_id)->first();
    $deliverer = App\User::where('id', $order->deliverer_id)->first();
    $offers = App\Offer::where('order_id', $order->id)->orderBy('price')->get();
    ?>
    <div class="container">
        <center>
            <h3>This is order {{ $order->id }} 's details.</h3>
        </center>
        <br/>
        <h4>Buyer: {{ $buyer->name }} <a href="/chat/<?php echo $buyer->id ?>">Chat</a></h4>
        @if ($deliverer)
            <h4>Deliverer: {{ $buyer->name }}</h4>
        @else
            <h4>Deliverer: Not yet!</h4>
        @endif
        <h4>Deliver to: {{ $order->deliver_location }}</h4>
        @if($order->deliverer_id)
            @if($order->is_delivered)
                <h4>Delivered: Already delivered</h4>
            @else
                <h4>Delivered: Not yet delivered</h4>
            @endif
            @if($order->is_received)
                <h4>Delivered: Already received</h4>
            @else
                <h4>Delivered: Not yet received</h4>
            @endif
        @endif
        @if(Auth::user()->id == $order->deliverer_id)
            @if($order->is_delivered)
                     <h4>Delivery has already been confirmed</h4>
            @else
                {!! Form::open(['route'=>['confirm.deliver',$order]]) !!}
                     <button id="btn-submit" type="submit" class="btn btn-success">Confirm delivery</button>
                {!! Form::close() !!}
            @endif
        @endif
        <br/>
        <div class="row">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th class="col-xs-1"></th>
                    <th class="col-xs-3">Item name</th>
                    <th class="col-xs-2">Price</th>
                    <th class="col-xs-2">Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $order_to_foods = $order->get_all_foods_with_details();
                ?>
                @foreach ($order_to_foods as $item)
                    <?php
                    $i++;
                    ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item['food']->name }}</td>
                        <td>${{ $item['food']->price }}</td>
                        <td>{{ $item['amount'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        Total
                    </td>
                    <td>
                        ${{ $order->get_total_food_price() }}
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        @if ($offers->isNotEmpty())
            <div class="row">
                <h4>This order's offers:</h4>
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th class="col-xs-1"></th>
                        <th class="col-xs-4">Offerer</th>
                        <th class="col-xs-3">Price</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    ?>
                    @foreach ($offers as $offer)
                        <?php
                        $i++;
                        $offerer = App\User::where('id', $offer->offerer_id)->first();
                        ?>
                        @if (Auth::check() && Auth::user()->id == $offer->offerer_id)
                            <tr class="highlight">
                        @else
                            <tr>
                                @endif
                                <td>{{ $i }}</td>
                                <td>{{ $offerer->name }}</td>
                                <td>${{ $offer->price }}</td>
                                @if (Auth::check() && Auth::user()->id == $order->buyer_id)
                                    <td>
                                        <a href="/chat/<?php echo $offer->offerer_id ?>">Chat</a>
                                    </td>
                                    <td>
                                        {!! Form::open() !!}
                                        <button name="offer_id" id="btn-submit" type="submit" class="btn btn-success"
                                                value="{{ $offer->id }}">Accept Offer
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if (Auth::check() && Auth::user()->id != $order->buyer_id)
            <?php
            $offer = App\Offer::where('offerer_id', $user->id)->where('order_id', $order->id)->first();
            ?>
            {!! Form::open(['url' => '/makeoffer/' . $order->id]) !!}
            <label for="amount" class="form-control">Make an Offer</label>
            <input required name="amount" type="number" class="form-control text-center"/>
            <button id="btn-submit" type="submit" class="btn btn-success">Make Offer</button>
            {!! Form::close() !!}
        @endif
    </div>
@endsection

<div class="container">
    <center>
        <h3>This is order {{ $order->id }} 's details.</h3>
    </center>
    <br/>
    <div class="row">
        <h4 class="col-sm-2 vcenter">
            Buyer:
        </h4>
        <h4 class="col-sm-4 vcenter">
            <a href="/profile/<?php echo $buyer->id ?>">
                {{ $buyer->name }}
            </a>
        </h4>
    </div>
    <div class="col-sm-2 vcenter">
        <a href="/chat/<?php echo $buyer->id ?>">
            <img style="width:120px;height:35px;margin:0px 5px 5px 0px;box-shadow: 2px 2px 2px #888888;" src="/img/icons/chatwithbuyer.jpg">
        </a>
    </div>

    @if ($deliverer)
        <div class="row">
            <h4 class="col-sm-2">
                Deliverer:
            </h4>
            <h4 class="col-sm-4 vcenter">
                <a href="/profile/<?php echo $deliverer->id ?>">
                    {{ $deliverer->name }}
                </a>
            </h4>
            <div class="col-sm-2 vcenter">
                <a href="/chat/<?php echo $deliverer->id ?>">
                    <img style="width:120px;height:35px;margin:0px 5px 5px 0px;box-shadow: 2px 2px 2px #888888;" src="/img/icons/chatwithdeliverer.jpg">
                </a>
            </div>
        </div>
    @else
        <div class="row">
            <h4 class="col-sm-2">
                Deliverer:
            </h4>
            <h4 class="col-sm-4">
                Not Yet!
            </h4>
        </div>
    @endif
    <div class="row">
        <h4 class="col-sm-2">
            Deliver to:
        </h4>
        <h4 class="col-sm-4">
            {{ $order->deliver_location }}
        </h4>
    </div>

    @if($order->deliverer_id)
        <div class="row">
            @if($order->is_delivered)
                <h4 class="col-sm-2">
                    Delivery Status:
                </h4>
                <h4 class="col-sm-4">
                    Already Delivered
                </h4>
            @else
                <h4 class="col-sm-2">
                    Delivery Status:
                </h4>
                <h4 class="col-sm-4">
                    Not Yet Delivered
                </h4>
            @endif
            @if(Auth::user()->id == $order->deliverer_id && $order->buyer_id)
                <div class="col-sm-2">
                    @if($order->is_delivered)
                        <a href="#" class="btn btn-success btn-lg active" role="button" aria-pressed="true"
                           disabled>
                            Delivery confirmed
                        </a>
                    @else
                        {!! Form::open(['route'=>['confirm.deliver',$order]]) !!}
                        <button id="btn-submit" type="submit" class="btn btn-success">
                            Confirm delivery
                        </button>
                        {!! Form::close() !!}
                    @endif
                </div>
            @endif
        </div>
    @endif


    <div class="row">
        @if ($order->delivery_time >= \Carbon\Carbon::now())
            <h4 class="col-sm-2">
                Expired in:
            </h4>
        @else
            <h4 class="col-sm-2">
                Expired:
            </h4>
        @endif
        <h4 class="col-sm-4">
            {{ $order->delivery_time->diffForHumans() }}
        </h4>
    </div>

    @if($order->buyer_id)
        <div class="row">
            @if($order->is_received)
                <h4 class="col-sm-2">
                    Receiving Status:
                </h4>
                <h4 class="col-sm-4">
                    Already Received
                </h4>
            @else
                <h4 class="col-sm-2">
                    Receiving Status:
                </h4>
                <h4 class="col-sm-4">
                    Not Yet Received
                </h4>
            @endif
            @if(Auth::user()->id == $order->buyer_id && $order->deliverer_id)
                <div class="col-sm-2">
                    @if($order->is_received)
                        <a href="#" class="btn btn-success btn-lg active" role="button" aria-pressed="true"
                           disabled>
                            Food has already been received
                        </a>
                    @else
                        {!! Form::open(['route'=>['confirm.receive',$order]]) !!}
                        <button id="btn-submit" type="submit" class="btn btn-success">
                            Confirm receiving of food
                        </button>
                        {!! Form::close() !!}
                    @endif
                </div>
            @endif
        </div>
    @endif


    @if($order->buyer_feedback)
        <div class="row">
            <h4 class="col-sm-2">
                Buyer Feedback:
            </h4>
            <h4 class="col-sm-4">
                {{$order->buyer_feedback}}
            </h4>
            <h4 class="col-sm-2">
                Buyer Rating:
            </h4>
            <h4 class="col-sm-4">
                {!! Form::text('buyer_rating',$order->buyer_rating,
        ['class'=>'rating',
        'data-show-clear'=>false,'data-show-caption'=>false,
        'data-readonly'=>true,'data-size'=>'xs'])!!}
            </h4>
        </div>
    @endif

    @if($order->deliverer_feedback)
        <div class="row">
            <h4 class="col-sm-2">
                Deliverer Feedback:
            </h4>
            <h4 class="col-sm-4">
                {{$order->deliverer_feedback}}
            </h4>
            <h4 class="col-sm-2">
                Deliverer Rating:
            </h4>
            <h4 class="col-sm-4">
                {!! Form::text('deliverer_rating',$order->deliverer_rating,
        ['class'=>'rating',
        'data-show-clear'=>false,'data-show-caption'=>false,
        'data-readonly'=>true,'data-size'=>'xs'])!!}
            </h4>
        </div>
    @endif
    <br/>
    @if (Auth::check() && Auth::user()->id == $order->buyer_id)
        <h4 class="col-xs-12">Update Delivery Time</h4>
        {!! Form::open(['url' => 'order/' . $order->id . '/update']) !!}
        <div class="row col-xs-12">
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        {!! Form::text('delivery_time',NULL,['class'=>'form-control', 'required' => true, 'value' => old('delivery_time')]) !!}
                        <span class="input-group-btn">
                        <button id="btn-submit" class="btn btn-success" type="submit">Update</button>
                        </span>
                    </div>
                </div>
        </div>
        {!! Form::close() !!}
    @endif

    <br/>
    <br/>

    <div class="row">
        <table class="table table-condensed">
            <thead>
                <th colspan="3">Order Items</th>
            </thead>
            <tbody>
            <?php
            $i = 0;
            $order_to_foods = $order->get_all_foods_with_details();
            ?>
            @foreach ($order_to_foods as $item)
                <?php
                $i++;
                $res_id=$item['food']-> restaurant_id;
                $res=App\Restaurant::where('id', $res_id)->first();
                ?>
                <tr>
                    <th colspan="3">{{ $item['food']->name }}</th>
                </tr>
                <tr>
                    <td></td>
                    <td>Location</td>
                    <td>{{$res-> location}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Restaurant</td>
                    <td>{{$res-> name}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Price</td>
                    <td>{{$item['food']-> price}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Amount</td>
                    <td>{{ $item['amount'] }}</td>
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
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    @if ($offers->isNotEmpty())
        <div class="row">
            <h4>This order's offers:</h4>
            <table class="table table-condensed" id="offer_table">
                <thead>
                <tr>
                    <th class="col-xs-1"></th>
                    <th class="col-xs-4">Offerer</th>
                    <th class="col-xs-2"></th>
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
                            <td >{{ $i }}</td>
                            <td><a href="/profile/<?php echo $offerer->id ?>">{{ $offerer->name }}</a></td>
                            <td><a href="/chat/<?php echo $offer->offerer_id ?>"><img src="/img/icons/chatwithdeliverer.jpg" style="width:130px;height:35px;box-shadow: 2px 2px 2px #888888;"></a></td>
                            <?php
                            $price = $offer->price;
                            echo '<td>$' . number_format($price,2) . '</td>';
                            ?>

                            @if (Auth::check() && Auth::user()->id == $order->buyer_id)
                                <td>

                                </td>
                                <td>
                                    {!! Form::open() !!}
                                    <button name="offer_id" id="btn-submit" type="submit" class="btn btn-success ao"
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
    @if (Auth::check() && Auth::user()->id == $order->buyer_id && !$order->deliverer_id)
        <center>
            <a href="/order/<?php echo $order->id ?>/delete" class="btn btn-danger">Cancel Order</a>
        </center>
    @endif
    @if (Auth::check() && Auth::user()->id != $order->buyer_id && !$order->deliverer_id && $order->delivery_time >= \Carbon\Carbon::now()->subMinutes(30))
        <?php
        $offer = App\Offer::where('offerer_id', $user->id)->where('order_id', $order->id)->first();
        ?>
        {!! Form::open(['url' => '/makeoffer/' . $order->id]) !!}

    <!--
    <div class="row">
        <div class="col-sm-2">
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_GB/i/scr/pixel.gif" width="1"
                 height="1">
            </form>
        </div>
    </div>
    -->
        <div class="row">
            <div class="col-sm-2">
                <br>
                {!! Form::label('amount', 'Make an Offer',['class'=>'control-label']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::number('amount', NULL, ['class'=>'form-control text-center','required','step'=>'0.10', 'min' => 0, 'max' => 999]) !!}
            </div>
            <div class="col-sm-3">
                <button id="btn-submit" type="submit" class="btn btn-success">
                    Make Offer
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    @endif
</div>
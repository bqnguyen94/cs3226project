@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        <h2 style="text-align: center">This is {{ $target->name }}'s profile page</h2>
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
                    <th class="col-xs-4">Date</th>
                    <th class="col-xs-3">Price</th>
                    <th class="col-xs-4">Deliverer</th>
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
                            <td><a href="/order/<?php echo $order->id ?>">{{ $i }}</a></td>
                            <td>{{ $order->created_at }}</td>
                            <td>${{ $price }}</td>
                            @if ($deliverer)
                            <td><a href="/profile/<?php echo $deliverer->id ?>">{{ $deliverer->name }}</a></td>
                            @else
                            <td>No Deliverer</td>
                            @endif
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
                    <th class="col-xs-4">Date</th>
                    <th class="col-xs-3">Price</th>
                    <th class="col-xs-4">Buyer</th>
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
                            <td><a href="/order/<?php echo $order->id ?>">{{ $i }}</a></td>
                            <td>{{ $order->created_at }}</td>
                            <td>${{ $price }}</td>
                            <td><a href="/profile/<?php echo $buyer->id ?>">{{ $buyer->name }}</a></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.template')
@section('main')
<div class="container">
    <center>
        <h3>This is order {{ $order->id }} 's details.</h3>
    </center>
    <br />
    <h4>Buyer: {{ $buyer->name }}</h4>
    @if ($deliverer)
    <h4>Buyer: {{ $buyer->name }}</h4>
    @else
    <h4>Buyer: Not yet!</h4>
    @endif
    <h4>Deliver to: {{ $order->deliver_location }}</h4>
    <br />
    <div class="row">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="col-xs-1"></th>
                    <th class="col-xs-4">Item name</th>
                    <th class="col-xs-3">Price</th>
                    <th class="col-xs-4">Amount</th>
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
</div>
@endsection

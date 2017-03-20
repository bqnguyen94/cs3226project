@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        <h3>Cart</h3>
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
                $user = Auth::user();
                $cart = $user->cart_get_foods();
                ?>
                @foreach ($cart as $cart_item)
                    <?php
                    $i++;
                    ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $cart_item['food']->name }}</td>
                        <td>${{ $cart_item['food']->price }}</td>
                        <td>{{ $cart_item['amount'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        Total
                    </td>
                    <td>
                        ${{ $user->cart_get_total_price() }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

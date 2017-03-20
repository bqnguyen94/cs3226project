@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        @foreach ($orders as $order)
            @if ($order->deliverer_id == null)
                @include('_order_card')
            @endif
        @endforeach
    </div>
</div>
@endsection

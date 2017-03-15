@extends('layouts.template')
@section('main')
<div class="container">
    <h1>Foods</h1>
    <div class="row">
        @foreach ($foods as $food)
            @include('_food_card')
        @endforeach
    </div>
</div>
@endsection

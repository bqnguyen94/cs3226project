@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        <center>
            <h4>Users with outstanding balances:</h4>
        </center>
    </div>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th class="col-xs-1"></th>
                <th class="col-xs-4">Name</th>
                <th class="col-xs-3">Balance</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>${{ $user->balance }}</td>
                    <td>
                        <a href="payouts/pay/<?php echo $user->id ?>" class="btn btn-success">Mark as resolved</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

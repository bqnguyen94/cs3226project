@extends('layouts.template')
@section('main')
<div class="container">
    <div class="row">
        <h2 style="text-align: center">This is {{ Auth::user()->name }}'s profile page</h2>
    </div>
</div>
<div class="container">
    <div class="row">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

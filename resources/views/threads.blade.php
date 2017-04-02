@extends('layouts.template')
@section('link')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('main')
<?php $user = Auth::user() ?>
<div class="container">
    <h3>This page shows overview of all messages this user has.</h3>
    <div class="panel-group">
       <div class="panel panel-default">
		    <ul class="nav nav-tabs">
				<li><div class="panel-heading" data-toggle="collapse" data-target="#panel_threads" style="cursor: pointer">
			  Inbox
			</div> </li>
			   <li>
					<a href="/chat/1" id="chatadmin">Message Admin</a>
				</li>
			 </ul>
           
            <div id="panel_threads" class="panel-collapse">
                <div class="panel-body">
                    <ul class="media-list">
                    @foreach ($threads as $thread)
                    <?php
                    $sender_id = $thread->first_user_id;
                    if ($sender_id == $user->id) {
                        $sender_id = $thread->second_user_id;
                    }
                    $sender = App\User::where('id', $sender_id)->first();
                    $last_message = $thread->get_last_message();
                    ?>
                        @if ($last_message)
                        <li class="media">
                            <div class="media-body">
                                <a class="pull-left" href="">
                                    <img class="media-object img-circle" src="https://image.flaticon.com/icons/png/512/78/78373.png" height="60px" width="60px" style="margin-right: 10px"/>
                                </a>
                                <div class="media-body">
                                    <a href="messages/<?php echo $thread->id ?>">From: {{ $sender->name }}</a>
                                    <br/>
                                    <small class="text-muted">{{ $last_message->message }}</small>
                                </div>
                            </div>
                        </li>
                        <hr/>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

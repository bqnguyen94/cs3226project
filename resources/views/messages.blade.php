@extends('layouts.template')
@section('link')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('main')
<head>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
</head>

<?php $user = Auth::user() ?>


<div id="message_warning" class="alert alert-warning alert-dismissable close" data-dismiss="alert">
    <strong>Warning:</strong> <p> Please do not give away your password and other personal information over this platform. Thank you! </p>
	<a href="#" class="close" data-dismiss="alert" aria-label="close" >
	  
   </a>
</div>

<div class="container">
    <h3>This page shows all messages this user has with a specific user.</h3>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                From: {{ $receiver->name }}
            </div>
            <div id="panel_messages" class="panel panel-default">
                <div class="panel-body" style="height: 400px;overflow-y: scroll;">
                    <ul class="media-list" id="message-list">
                    @foreach ($messages as $message)
                    <?php
                    $sender = App\User::where('id', $message->sender_id)->first();
                    ?>
                    <li class="media">
                        <div class="media-body row">
                            <?php if($receiver->name==$sender->name){ ?>
                            <a class="pull-left col-xs-1" style="min-width: 80px;" href="">
                                <img class="media-object img-circle" src="https://image.flaticon.com/icons/png/512/78/78373.png" height="60px" width="60px" style="margin-right: 10px"/>
                            </a>
                            <div class="col-xs-8 chatMsg receiver">
                                {{ $sender->name }}:
                                <br/>
                                {{ $message->message }}
                            </div>
                            <?php }else{ ?>
                            <div class="col-xs-2"></div>
                            <div class="col-xs-8 chatMsg self">
                                {{ $sender->name }}:
                                <br/>
                                {{ $message->message }}
                            </div>
                            <a class="pull-left col-xs-1" href="">
                                <img class="media-object img-circle" src="https://image.flaticon.com/icons/png/512/78/78373.png" height="60px" width="60px" style="margin-right: 10px"/>
                            </a>
                            <?php } ?>
                        </div>
                    </li>
                    @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <form id="reply">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input id="thread_id" name="thread_id" type="hidden" value="<?php echo $thread->id ?>">
                                <input id="message_input" name="message_input" type="text" class="form-control" placeholder="Enter Message" required/>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" id="btn-send-reply" name="thread_id" value="<?php echo $thread->id ?>" type="submit">REPLY</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    var receiverName="<?php echo $receiver->name ?>";
    var thread_id = {{ $thread->id }};
    @if ($messages->first())
       var last_time_id = {{ $messages->last()->id }};
    @else
        var last_time_id = 0;
    @endif
</script>
<script type="text/javascript" src="/js/messages.js"></script>
@stop

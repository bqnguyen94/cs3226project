@extends('layouts.template')
@section('link')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('main')
<?php $user = Auth::user() ?>
<div class="container">
    <h3>This page shows all messages this user has with a specific user.</h3>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                From: {{ $receiver->name }}
            </div>
            <div id="panel_messages" class="panel panel-default">
                <div class="panel-body">
                    <ul class="media-list" id="message-list">
                    @foreach ($messages as $message)
                    <?php
                    $sender = App\User::where('id', $message->sender_id)->first();
                    ?>
                    <li class="media">
                        <div class="media-body">
                            <a class="pull-left" href="">
                                <img class="media-object img-circle" src="https://image.flaticon.com/icons/png/512/78/78373.png" height="60px" width="60px" style="margin-right: 10px"/>
                            </a>
                            <div class="media-body">
                                {{ $sender->name }}
                                <br/>
                                {{ $message->message }}
                            </div>
                        </div>
                    </li>
                    <hr/>
                    @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <form id="reply">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input id="thread_id" name="thread_id" type="hidden" value="<?php echo $message->thread_id ?>">
                                <input id="message_input" name="message_input" type="text" class="form-control" placeholder="Enter Message" required/>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" id="btn-send-reply" name="thread_id" value="<?php echo $message->thread_id ?>" type="submit">REPLY</button>
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
    var thread_id = {{ $message->thread_id }};
    var last_time_id = {{ $message->id }};
</script>
<script type="text/javascript" src="/js/messages.js"></script>
@stop

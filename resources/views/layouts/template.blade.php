<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NUS Food</title>
        <link href="/img/logo.ico" rel="shortcut icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css">
        <link href='https://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
        @yield('link')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/js/mdb.min.js"></script>
        <link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/banner.css">
        <link href="{{asset("/css/star-rating.css")}}" media="all" rel="stylesheet" type="text/css"/>
        <link href="/css/carousel.css" rel="stylesheet">
        <script type="text/javascript" src="/js/fade.js"></script>
        <script type="text/javascript" src="/js/moveUp.js"></script>
        <script type="text/javascript" src="{{asset("/js/star-rating.js")}}"></script>
    </head>
    <body>
        <script>
        	notDisplay();
        </script>

        <div class="hidden-md hidden-lg">
            @include('layouts.headerForMobile')
        </div>
        <div class="hidden-sm hidden-xs">
            @include('layouts.header')
        </div>

        @if (Session::has('error'))
        <div class="container">
            <div class="alert alert-danger alert-dismissable fade in" role="alert" align="center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ Session::get('error') }}</strong>
            </div>
        </div>
        @elseif (Session::has('alert-success'))
        <div class="container">
            <div class="alert alert-success alert-dismissable fade in" role="alert" align="center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ Session::get('alert-success') }}</strong>
            </div>
        </div>
        @elseif (Session::has('alert-error'))
        <div class="container">
            <div class="alert alert-danger alert-dismissable fade in" role="alert" align="center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ Session::get('alert-error') }}</strong>
            </div>
        </div>
		@endif
        <div id="Animate" style="margin-top:20vh">
        @yield('main')
        </div>
        @include('layouts.footer')
    </body>
    <script src="{{asset("js/master.js")}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @yield('script')
</html>

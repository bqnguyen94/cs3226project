@extends('layouts.template')

	<style>
	
	body{
			background-image: url('/img/profile_background.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: right bottom; 
			
		}
		
	p{
		word-spacing:0.30em;
		 line-height: 150%;
		
		}
	
	.about{
		background-color: rgba(242, 254, 251, 0.75);
		
		}
	</style>

@section('main')

<div class="container">

	
	<div class="about col-xs-12">
	<h3 >Description</h3>
	<img src="/img/logo.jpg" class="col-xs-2" style="width:130px;height:100px">
	<p class="col-xs-10">NUSFood is an online food ordering system that sells to mainly NUS students and staffs. Food is then delivered from restaurants and food stalls within school campus by students for other students. Our focus is on providing a more affordable mode of delivery, as compared to more invested companies such as Deliveroo, and help students who do not have time to queue up to acquire their food.</p>
	</div>
	<br>
	<div class="about col-xs-12">
	<h3 >Feedbacks</h3>
	<p >Currently, we are still at prototying stage. If you do have any feedback, kindly drop us a <a href="/chat/1">chat</a> after signing up for an account.</p>
	</div>
	
	<div class="about col-xs-12">
	<h3 >Our location</h3>
	<p >NUS School of Computing, <br>
		COM1, 13 Computing Drive,<br> 
		Singapore 117417</p>
	

</div>
@endsection
	
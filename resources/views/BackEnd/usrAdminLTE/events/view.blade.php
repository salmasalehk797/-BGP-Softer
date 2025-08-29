@extends('Backend.AdminLTE.dashboard')
@section('content')
	<!-- <a href="/events" class="btn btn-default pull-left">Back</a> -->
	<h1>About the Event</h1>
	@if($event)
		<div class="box box-primary">
			<ul class="nav nav-tabs" style="font-size: 20px">
			    <li class="active"><a data-toggle="tab" href="#main" style="">Main Info</a></li>
			    <li><a data-toggle="tab" href="#more">More Images</a></li>
			</ul>
			<div class="box-body">
				<div class="tab-content">
					<div id="main" class="tab-pane fade in active">
						<div class="row" style="position: relative;left: 1.2%;">
							<label>Main Info:</label>
						</div>
						<div class="text-center">
							<img src="/storage/main_img/{{$event->event_type}}/{{$event->main_img}}" style="max-width: 95%">
						</div>
						<div class="text-center">
							<h2><b>Title: {{$event->title}} </b></h2>
							<hr>
							<p><b>Date: </b>{{$event->event_date}}</p>
							<hr>
					        <p><b>Type: </b>{{$event->event_type}}</p>
					        <hr>
					        <b>Description: </b>{!!$event->description!!}
						</div>
					</div>
					<div id="more" class="tab-pane fade">
						<div class="row" style="position: relative;left: 1.2%;">
							<label>More Image:</label>
						</div>
						@foreach($eventimgs as $img)
	    					<img src="/storage/event_imgs/{{$event->event_type}}/{{$img->img_url}}" style="float: left; width: 30%; margin-right: 1%; margin-bottom: 0.5em;" >
	    				@endforeach
					</div>
				</div>
			</div>
		</div>
	@endif
@endsection

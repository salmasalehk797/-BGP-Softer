@extends('BackEnd.AdminLTE.dashboard')
@section('content')
<h1>Edit Event</h1>
<div class="box box-primary">
    <ul class="nav nav-tabs" style="font-size: 20px">
	    <li class="active"><a data-toggle="tab" href="#main" style="">Main Info</a></li>
	    <li><a data-toggle="tab" href="#more">Images</a></li>
	</ul>
	<div class="box-body">
		<div class="tab-content">
			<div id="main" class="tab-pane fade in active">
				{!!Form::open(['action' => ['EventsController@update', $event->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
					<div class="box-header with-border">
				        <h6 class="box-title">Main Info:</h6>
				    </div>
					<div class="form-group">
				        {{Form::label('title', 'Title')}}
				        {{Form::text('title', $event->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
				    </div>
				    <div class="form-group">
				        {{Form::label('event_type', 'Event Type')}}
				        {{Form::text('event_type', $event->event_type, ['class' => 'form-control', 'placeholder' => 'Event Type'])}}
				    </div>
				    <div class="form-group">
				    	{{Form::label('description', 'Description')}}
		            	{!!Form::textarea('description',  $event->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])!!}
				    </div>
				    <div class="form-group">
				        {{Form::label('event_date', 'Event Date')}}
			            <div class="input-group">
			                <div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                </div>
			                <input id="event_date" type="date" class="form-control" name="event_date" >
			            </div>
				    </div>
					<div class="form-group">
			            {{Form::file('main_img')}}
			        </div>
					<div class="box-footer">
						{{Form::submit('Save',['class' => 'btn btn-primary'])}}
						<a href="/events" class="btn btn-default pull-right">Cancel</a>
					</div>
					{{Form::hidden('_method','PUT')}}
				{!!Form::close()!!}
			</div>
			<div id="more" class="tab-pane fade in">
				<div class="row" style="position: relative;left: 1.2%">
					<label>Main Image:</label>
				</div>
				<div class="row" style="position: relative;left: 1.2%">
			    	<img src="/storage/main_img/{{$event->event_type}}/{{$event->main_img}}" style="max-width: 95%">
				</div>
				
			    <label>More Images:</label>
	    		@foreach($eventimgs as $img)
	    			<div class="container" style="position: relative; top: 50%">
	    				{!!Form::open(['action' => ['EventImagesController@destroy', $img->id], 'method' => 'POST'])!!}
		                	{{Form::hidden('_method','DELETE')}}
		                	<button type="submit" class="btn btn-default" style="border-radius: 100%; position: absolute;top:5%;" onclick="return confirm('Are you sure you want to delete this image?')">
		                		<i class="fa fa-remove" ></i>
		                	</button>
		                {!!Form::close()!!}
		                <img src="/storage/event_imgs/{{$event->event_type}}/{{$img->img_url}}" style="float: left; width: 30%; margin-right: 1%; margin-bottom: 0.5em;" >
	    			</div>
	    			
	    			
	    		@endforeach
			</div>
		</div>
	</div>
</div>
@endsection 


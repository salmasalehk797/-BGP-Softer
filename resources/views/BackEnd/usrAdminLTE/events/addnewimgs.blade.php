@extends('BackEnd.AdminLTE.dashboard')
@section('content')
	{!!Form::open(['action' => ['EventImagesController@update', $event->id], 'method' => 'POST', 'files' => true, 'class' => 'dropzone', 'enctype' => 'multipart/form-data', 'id' => 'image-upload'])!!}
		{{Form::hidden('_method','PUT')}}
	{!!Form::close()!!}
	
@endsection
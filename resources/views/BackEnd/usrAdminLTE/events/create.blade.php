@extends('BackEnd.AdminLTE.dashboard')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Create Event</h1>
    </div>
    {!!Form::open(['action' => 'EventsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="box-body">
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('event_type', 'Event Type')}}
                <select class="form-control" name="type">
                    <option>Meeting</option>
                    <option>Training</option>
                    <option>Dissemination</option>
                </select>
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
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
        </div>
        <div class="box-footer">
            {{Form::submit('Save',['class' => 'btn btn-primary'])}}
        </div>
    {!!Form::close()!!}
</div>
@endsection 


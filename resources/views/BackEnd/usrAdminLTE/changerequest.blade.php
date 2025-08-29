@extends('BackEnd.usrAdminLTE.dashboard')
@section('content')
<!-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Edit Survey Reports Page</h1>
    </div>
    <div class="box-body">
        {!!Form::open(['action' => ['ReportsController@store', $project[0]->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            <h1>{{$project[0]->projectname}}</h1>
        </div>
        <div class="form-group">
            <input type="hidden" name="type" value="Change Request">
        </div>
        <div class="form-group">
	    	{{Form::label('content', 'Feedback Content')}}
        	{!!Form::textarea('reporttxt', $project[0]->projecttype,['id' => 'editor1', 'class' => 'form-control', 'placeholder' => 'Content'])!!}
	    </div>
        
    </div>
    <div class="box-footer">
        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
    </div>
    {!!Form::close()!!}
</div>


@endsection
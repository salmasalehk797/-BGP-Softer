@extends('BackEnd.AdminLTE.dashboard')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Edit Survey Reports Page</h1>
    </div>
    <div class="box-body">
        {!!Form::open(['action' => 'cmsController@update_aboutus', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            <h1>{{$aboutus[0]->page_type}}</h1>
        </div>
        <div class="form-group">
	    	{{Form::label('content', 'Content')}}
        	{!!Form::textarea('content', $aboutus[0]->page_content, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Content'])!!}
	    </div>
        <div class="form-group">
            {{Form::label('summary', 'Summary')}}
            {!!Form::textarea('summary', $aboutus[0]->homepage, ['class' => 'form-control', 'placeholder' => 'Summary'])!!}
        </div>
    </div>
    <div class="box-footer">
        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
    </div>
    {!!Form::close()!!}
</div>

@endsection
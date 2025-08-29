@extends('BackEnd.AdminLTE.dashboard')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add Example</h1>
    </div>
    {!!Form::open(['action' => 'ExamplesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="box-body">
        <div class="form-group">
            {{Form::label('program', 'Program')}}
            <select name="program">
                <option value="Streaming &amp; Blogging">Streaming & Blogging</option>
                <option value="Social Media">Social Media</option>
                <option value="EDU">EDU</option>
                <option value="Medical">Medical</option>
                <option value="E-Commerce">E-Commerce</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            {{Form::label('url', 'URL')}}
            {{Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'URL'])}}
        </div>
        <div class="form-group">
            {{Form::file('bkg_img')}}
        </div>
    </div>
    <div class="box-footer">
        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
    </div>
    {!!Form::close()!!}
</div>
@endsection 


@extends('BackEnd.AdminLTE.dashboard')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Create User</h1>
    </div>
    {!!Form::open(['action' => 'UsersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="box-body">
        <div class="form-group">
            {{Form::label('firstname', 'First Name')}}
            {{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('lastname', 'Last Name')}}
            {{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('job', 'Job')}}
            {{Form::text('job', '', ['class' => 'form-control', 'placeholder' => 'Job'])}}
        </div>
        <div class="form-group">
            {{Form::label('pass', 'Password')}}
            <input id="password" type="password" class="form-control" name="password" >
        </div>
        <div class="form-group">
            {{Form::label('pass', 'Confirm Password')}}
            <input id="confirm_password" type="password" class="form-control" name="password_confirmation" >
        </div>
        <div class="form-group">
            {{Form::file('profile_img')}}
        </div>
    </div>
    <div class="box-footer">
        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
    </div>
    {!!Form::close()!!}
</div>
@endsection 


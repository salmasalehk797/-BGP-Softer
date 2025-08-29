@extends('BackEnd.usrAdminLTE.dashboard')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h6 class="box-title">Edit User</h6>
    </div>
    <ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#main" style="">Main Info</a></li>
	    <li><a data-toggle="tab" href="#pass">Password</a></li>
	</ul>
	{!!Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST'])!!}
		<div class="box-body">
			<div class="tab-content">
				<div id="main" class="tab-pane fade in active">
					<h3>Main Info:</h3>
					<div class="form-group" style="display: inline-block;">
				        {{Form::label('firstname', 'First Name')}}
				        {{Form::text('firstname', $user->firstname, ['class' => 'form-control', 'placeholder' => 'Name'])}}
				    </div>
				    <div class="form-group" style="display: inline-block;">
				        {{Form::label('lastname', 'Last Name')}}
				        {{Form::text('lastname', $user->lastname, ['class' => 'form-control', 'placeholder' => 'Name'])}}
				    </div>
				    <div class="form-group">
				        {{Form::label('email', 'Email')}}
				        {{Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
				    </div>
				    <div class="form-group">
				    	{{Form::label('job', 'Job')}}
				        {{Form::text('job', $user->usertype, ['class' => 'form-control', 'placeholder' => 'Job'])}}
				    </div>
				    <div class="form-group">
		        		{{Form::file('profile_img')}}
		    		</div>
				</div>
				<div id="pass" class="tab-pane fade">
					<h3>Password:</h3>
					<div class="form-group">
				        {{Form::label('pass', 'Old Password')}}
			        	<input id="password" type="password" class="form-control" name="old_password" >
				    </div>
				    <div class="form-group">
				        {{Form::label('pass', 'Password')}}
			        	<input id="password" type="password" class="form-control" name="password" >
				    </div>
					<div class="form-group">
			            {{Form::label('pass', 'Confirm Password')}}
			            <input id="confirm_password" type="password" class="form-control" name="password_confirmation" >
			        </div>
				</div>
				<div class="box-footer">
					{{Form::submit('Save',['class' => 'btn btn-primary'])}}
					<a href="/dashboard" class="btn btn-default pull-right">Cancel</a>
				</div>
			</div>
		</div>
		{{Form::hidden('_method','PUT')}}
	{!!Form::close()!!}
</div>
@endsection 


@extends('Backend.AdminLTE.dashboard')
@section('content')
	<a href="/users" class="btn btn-default pull-left">Back</a>
	@if($user)
		<!-- <div class="well">
			<img src="/storage/profile_img/{{$user->profile_img}}" class="avatar" >
	        <h3>{{$user->name}}</h3>
	        <p>{{$user->email}}</p>
	        <p>{!!$user->job!!}</p>
	        </div> -->
        <div class="box box-primary">
			<div class="box-body box-profile">
			  <img class="profile-user-img img-responsive img-circle" src="/storage/profile_img/{{$user->profile_img}}" alt="User profile picture">

			  <h3 class="profile-username text-center">{{$user->name}}</h3>

			  <p class="text-muted text-center">{!!$user->job!!}</p>

			  <ul class="list-group list-group-unbordered text-center">
			    <li class="list-group-item">
			      <b>Email: </b> {{$user->email}}
			    </li>
			    <li class="list-group-item">
			      <b>Member Since: </b> <?php echo date("m-Y",strtotime($user->created_at))?>
			    </li>
			  </ul>
			</div>
		</div>
	@endif
@endsection



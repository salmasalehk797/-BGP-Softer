@extends('BackEnd.AdminLTE.dashboard')
@section('content')
@if($usrs)
<!-- <form class="form-inline">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search..." id="myInput">
      <i class="fa fa-search icon"></i>
    </div>
  </form> -->
  <div class="box">
    <div class="box-header with-border">
      <h1 class="box-title">Users' Data Table</h1>
    </div>
    <div class="box-body">
      <div class="dataTables_wrapper form-inline dt-bootstrap">
        <table class="table table-bordered table-hover" id="myTable">
          <thead>
            <th>Profile Picture</th>
            <th>Name</th>
            <th>Job Title</th>
            <th>Joined On</th>
            <th>Delete</th>
          </thead>
          <tbody>
            @foreach($usrs as $u)
              @if($u->usertype != 'customer')
                <tr onclick="window.location='/users/{{$u->id}}';">
                  <td><img src="/storage/profile_img/{{$u->profile_img}}" class="avatar" style="width: 50px; height: 50px; border-radius: 0%;">
                  </td>
                  <td>
                    <p>{{$u->firstname}} {{$u->lastname}}</p>
                  </td>
                  <td>
                    <p>{!!$u->usertype!!}</p>
                  </td>
                  <td>
                    <p><?php echo date("d-m-Y",strtotime($usr->created_at))?></p>
                  </td>
                  <td>
                    {!!Form::open(['action' => ['UsersController@destroy', $u->id], 'method' => 'POST'])
                    !!}
                      {{Form::hidden('_method','DELETE')}}
                      <!-- {{Form::submit('Delete',['class' => '', 'onclick' => ''])}} -->
                      <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                    {!!Form::close() !!}
                  </td>
                </tr>
              @endif
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@else 
  No Users Found
@endif
@endsection
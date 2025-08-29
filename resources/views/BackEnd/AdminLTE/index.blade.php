@extends('BackEnd.AdminLTE.dashboard')
@section('content')
@if($projects)
  <div class="box">
    <div class="box-header with-border">
      <h1 class="box-title">Projects' Data Table</h1>
    </div>
    <div class="box-body">
      <div class="dataTables_wrapper form-inline dt-bootstrap">
        <table class="table table-bordered table-hover" id="myTable">
          <thead>
            <th>Title</th>
            <th>Type</th>
            <th>Program</th>
            <th>Status</th>
            <th></th>
            <th>Edit</th>
            <th>Terminate</th>
          </thead>
          <tbody>
            @foreach($projects as $project)
              <tr onclick="window.location='/projects/{{$project->id}}';">
                <td>
                  <p>{{$project->projectname}}</p>
                </td>
                <td>
                  <p>{!!$project->projecttype!!}</p>
                </td>
                <td>
                  <p>{{$project->program}}</p>
                </td>
                <td>
                  <p>{{$project->status}}</p>
                </td>
                @if($project->status == 'Pending')
                  <td>
                    {!!Form::open(['action' => ['projectscontroller@update', $project->id], 'method' => 'PUT'])!!}
                      {{Form::hidden('_method','PUT')}}
                      @method('PUT')
                      @csrf
                      <input type="hidden" name="status" value="Accepted">
                      <input type="submit" value="Accept" class="btn btn-success" onclick="return confirm('Are you sure you want to accept this project?')">
                    {!!Form::close() !!}
                    <!-- <a href="" class="btn btn-success">Accept</p> -->
                  </td>
                @else
                  <td></td>
                @endif
                <td>
                  @if($project->developer_id == $usr->id)
                    <a href="projects/{{$project->id}}/edit" class="btn btn-info">Edit</a>
                  @endif
                </td>
                <td>
                  {!!Form::open(['action' => ['projectscontroller@destroy', $project->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    <!-- {{Form::submit('Delete',['class' => '', 'onclick' => ''])}} -->
                    <input type="submit" value="Terminate" class="btn btn-danger" onclick="return confirm('Are you sure you want to terminate this project?')">
                  {!!Form::close() !!}
                </td>
              </tr>
                
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@else 
  No Projects Found
@endif
@endsection
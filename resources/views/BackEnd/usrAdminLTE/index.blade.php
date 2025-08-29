@extends('BackEnd.usrAdminLTE.dashboard')
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
            <th>Update URL</th>
            <th>Accept & Finalize</th>
            <th>Feedback</th>
            <th>Request Change</th>
            <th></th>
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
                <td>
                  <a href="{{$project->updateurl}}">{{$project->updateurl}}</p>
                </td>
                <td>
                  {!!Form::open(['action' => ['projectscontroller@update', $project->id], 'method' => 'PUT'])!!}
                    {{Form::hidden('_method','PUT')}}
                    <input type="hidden" name="status" value="finalization">
                    <!-- {{Form::submit('Delete',['class' => '', 'onclick' => ''])}} -->
                    <input type="submit" value="Accept" class="btn btn-success" onclick="return confirm('Are you sure you want to finalize the project based on this update?')">
                  {!!Form::close() !!}
                </td>
                <td>
                  <a href="projects/{{$project->id}}/feedback" class="btn btn-info">Feedback</a>
                </td>
                <td>
                  <a href="projects/{{$project->id}}/requestchange" class="btn btn-primary">Request Change</a>
                </td>
                <td>
                  {!!Form::open(['action' => ['projectscontroller@destroy', $project->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    <!-- {{Form::submit('Delete',['class' => '', 'onclick' => ''])}} -->
                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">
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
@extends('BackEnd.AdminLTE.dashboard')
@section('content')
@if($events)
  <div class="box">
    <div class="box-header with-border">
      <h1 class="box-title">Events' Data Table</h1>
    </div>
    <div class="box-body">
      <div class="dataTables_wrapper form-inline dt-bootstrap">
        <table class="table table-bordered table-hover">
          <thead>
            <th>Title</th>
            <th>Type</th>
            <th>Add more images</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            @foreach($events as $event)
              <tr onclick="window.location='/events/{{$event->id}}';">
                <td>
                  <p>{{$event->title}}</p>
                </td>
                <td>
                  <p>{!!$event->event_type!!}</p>
                </td>
                <td>
                  <a href="eventimgs/{{$event->id}}/edit" class="btn btn-success">Add Images</a>
                </td>
                <td>
                  <a href="events/{{$event->id}}/edit" class="btn btn-primary">Edit</a>
                </td>
                <td>
                  {!!Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    <!-- {{Form::submit('Delete',['class' => '', 'onclick' => ''])}} -->
                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">
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
  No Events Found
@endif
@endsection
@extends('BackEnd.AdminLTE.dashboard')
@section('content')
@if($media)
  <div class="box">
    <div class="box-header with-border">
      <h1 class="box-title">Media Data Table</h1>
    </div>
    <div class="box-body">
      <div class="dataTables_wrapper form-inline dt-bootstrap">
        <table class="table table-bordered">
          <thead>
            <th>Title</th>
            <th>URL</th>
            <th>Delete</th>
          </thead>
          <tbody>
            @foreach($media as $m)
              <tr>
                <td>
                  <p>{{$m->name}}</p>
                </td>
                <td>
                  <a href="/media/{{$m->id}}" target="_blank" style="color: blue"><?php echo URL('/media') ?>/{{$m->id}}</a>
                </td>
                <td>
                  {!!Form::open(['action' => ['MediaController@destroy', $m->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    <!-- {{Form::submit('Delete',['class' => '', 'onclick' => ''])}} -->
                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?')">
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
  No Media Found
@endif
@endsection
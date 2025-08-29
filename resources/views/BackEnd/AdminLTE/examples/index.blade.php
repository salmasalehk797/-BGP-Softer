@extends('BackEnd.AdminLTE.dashboard')
@section('content')
<!-- <form class="form-inline">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search..." id="myInput">
      <i class="fa fa-search icon"></i>
    </div>
  </form> -->
  <div class="box">
    <div class="box-header with-border">
      <h1 class="box-title">Examples' Data Table</h1>
    </div>
    <div class="box-body">
      <div class="dataTables_wrapper form-inline dt-bootstrap">
        <table class="table table-bordered table-hover" id="myTable">
          <thead>
            <th>Picture</th>
            <th>Program</th>
            <th>URL</th>
            <th>Delete</th>
          </thead>
          <tbody>
            @foreach($examples as $example)
              <tr onclick="window.location='/examples/{{$example->id}}';">
                <td><img src="/storage/bkg_img/{{$example->bkg_img}}" class="avatar" style="width: 50px; height: 50px; border-radius: 0%;">
                </td>
                <td>
                  <p>{{$example->program}}</p>
                </td>
                <td>
                  <p>{!!$example->url!!}</p>
                </td>
                <td>
                  {!!Form::open(['action' => ['ExamplesController@destroy', $example->id], 'method' => 'POST'])
                  !!}
                    {{Form::hidden('_method','DELETE')}}
                    <!-- {{Form::submit('Delete',['class' => '', 'onclick' => ''])}} -->
                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this example?')">
                  {!!Form::close() !!}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
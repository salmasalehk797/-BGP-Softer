@extends('BackEnd.AdminLTE.dashboard')
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Project Update</h1>
    </div>
    <div class="box-body">
        <div class="form-group">
            <h1>{{$project->projectname}}, <?php echo date("d-m-Y",strtotime($project->created_at))?></h1>
        </div>
        <div class="form-group">
            <h2>Status: {{$project->status}}</h2>
        </div>
        <div class="form-group">
            <h4>Description: </h4>{{$project->description}}
        </div>
        <div class="form-group">
            {!!Form::open(['action' => ['projectscontroller@update', $project->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}

            	<div class="form-group">
                    {{Form::label('req', 'Requirements:')}}
                    {!!Form::textarea('req', $project->requirements,['id' => 'editor1', 'class' => 'form-control', 'placeholder' => 'Content'])!!}
                </div>
                <div class="form-group">
                    {{Form::label('update_url', 'Update URL')}}
                    <input type="text" name="update_url">
                </div>
                <div class="box-footer">
                    {{Form::submit('Save',['class' => 'btn btn-primary'])}}
                    <a href="/projects" class="btn btn-default pull-right">Cancel</a>
                </div>
                {{Form::hidden('_method','PUT')}}
            {!!Form::close()!!}
        </div>
    </div>
        
    <div class="box-footer">
        
    </div>
</div>


@endsection
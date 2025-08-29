@extends('BackEnd.usrAdminLTE.dashboard')
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Project Information Page</h1>
    </div>
    <div class="box-body">
        <div class="form-group">
            <h1>{{$project[0]->projectname}}, <?php echo date("d-m-Y",strtotime($project[0]->created_at))?></h1>
        </div>
        <div class="form-group">
            <h2>Status: {{$project[0]->status}}</h2>
        </div>
        <div class="form-group">
            <h4>Description: </h4>{{$project[0]->description}}
        </div>
        <div class="form-group">
            <h4>Requirements: </h4>{{$project[0]->requirements}}
        </div>
        <div class="form-group">
            <div class="container">
                @if($feedbacks)
                    <h4>Feedback: </h4>
                @endif
                @foreach ($feedbacks as $feedback)
                        
                    {{ $feedback->report }}
                @endforeach
            </div>
            {{ $feedbacks->links() }}
        </div>
        <div class="form-group">
            <div class="container">
                @if($changes)
                    <h4>Change Requests: </h4>
                @endif
                @foreach ($changes as $change)
                        
                    {{ $change->report }}
                @endforeach
            </div>
            {{ $changes->links() }}
        </div>
    </div>
        
    <div class="box-footer">
        
    </div>
</div>


@endsection
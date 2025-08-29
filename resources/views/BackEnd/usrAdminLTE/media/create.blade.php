@extends('BackEnd.AdminLTE.dashboard')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add File</h1>
    </div>
    <div class="box-body">
        {!!Form::open(['action' => 'MediaController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <!-- {!!Form::open(['action' => 'MediaController@store', 'method' => 'POST', 'files' => true, 'class' => 'dropzone', 'id' => 'file-upload', 'name' => 'mediadropzone'])!!}
        {!!Form::close()!!} -->
        <div class="file-uploader">
            <label name="upload-label" class="upload-img-btn">
            <img class="preview" src="" style="width:100% !important;" />
            </label>
        </div>
        <div class="form-group" >
                <input type="file" size="60" class="upload-field-1" name="newfile" />
            
        </div>
        
    </div>
    <div class="box-footer">
        {{Form::submit('Save',['class' => 'btn btn-primary', 'id' => 'uploadbtn'])}}
    </div>
    {!!Form::close()!!}
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                $('.file-uploader .preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    } 
    
    $("[class^=upload-field-]").change(function(){
        readURL(this);
    });
</script>

@endsection 


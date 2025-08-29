@extends('BackEnd.AdminLTE.dashboard')
@section('content')
	{!!Form::open(['action' => ['EventImagesController@store'], 'method' => 'POST', 'files' => true, 'class' => 'dropzone', 'enctype' => 'multipart/form-data', 'id' => 'image-upload', 'name' => 'imgdropzone'])!!}
		{{Form::hidden('id', $e_id)}}
	{!!Form::close()!!}
	
	<script>
		Dropzone.options.imageUpload = {
	      maxFilesize: 12,
	      renameFile: function(file) {
	          var dt = new Date();
	          var time = dt.getTime();
	         return time+file.name;
	      },
	      acceptedFiles: ".jpeg,.jpg,.png,.gif",
	      addRemoveLinks: true,
	      timeout: 5000,
	      success: function(file, response) 
	      {
	          console.log(response);
	      },
	      error: function(file, response)
	      {
	         return false;
	      }
	    };
	</script>
@endsection
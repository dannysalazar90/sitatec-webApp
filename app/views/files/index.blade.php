@extends('master')

@section('content')

<div class="upload">
      {{ Form::open(array('url' => 'upload', 'files' => true)) }}
      @if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
		@endif
        {{ Form::file('fileUpload') }}
        <p class="submit">
        {{ Form::submit('Subir Archivo', array('class' => 'btn btn-success', 'name' => 'commit')) }}
        </p>
      {{ Form::close() }}
</div>

<!--<input id="lefile" type="file" style="display:none">
<div class="input-append">
<input id="photoCover" class="input-large" type="text">
<a class="btn" onclick="$('input[id=lefile]').click();">Browse</a>
</div>
 
<script type="text/javascript">
$('input[id=lefile]').change(function() {
$('#photoCover').val($(this).val());
});
</script>-->
@stop
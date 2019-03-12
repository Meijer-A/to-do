@extends('layout.app')

@section('content')
<div class="container">
	
	<h1>Maak een lijst aan</h1>

    {{ HTML::ul($errors->all()) }}

	{{ Form::open(array('url' => 'collection')) }}

		<div class="form-group">
            {{ Form::label('name', 'name') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	    </div>

	    {{ Form::submit('Maak lijst aan', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}




	
</div>
@endsection
@extends('layout.app')

@section('content')
<div class="container">
	
	<h1>Maak een lijst aan</h1>

    {{ HTML::ul($errors->all()) }}

	{{ Form::open(array('url' => 'task')) }}

		<div class="form-group">
            {{ Form::label('description', 'Taak') }}
            {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
	    </div>

		<div class="form-group">
            {{ Form::label('duration', 'duur(min)') }}
            {{ Form::number('duration', Input::old('duration'), array('class' => 'form-control')) }}
	    </div>

		<div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', array( 'open' => 'open', 'in progress' => 'in progress', 'done' => 'done'), 'open', array('class' => 'form-control')) }}
	    </div>
		<input type="hidden" value="{{$collection_id}}" name="collection_id">
	    {{ Form::submit('Maak lijst aan', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}




	
</div>
@endsection
@extends('layout.app')

@section('content')
<div class="container">
	
	<h1>Edit {{ $task->description }}</h1>
	
	{{ HTML::ul($errors->all()) }}

	{{ Form::model($task, array('route' => array('task.update', $task->id), 'method' => 'PUT')) }}

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
	    {{ Form::submit('Edit Collection', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
	
</div>
@endsection
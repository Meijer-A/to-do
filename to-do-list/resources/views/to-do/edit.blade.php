@extends('layout.app')

@section('content')
<div class="container">
	
	<h1>Edit {{ $list->title }}</h1>
	
	{{ HTML::ul($errors->all()) }}

	{{ Form::model($list, array('route' => array('list.update', $list->id), 'method' => 'PUT')) }}

	    <div class="form-group">
	        {{ Form::label('name', 'Name') }}
	        {{ Form::text('name', null, array('class' => 'form-control')) }}
	    </div>

	    {{ Form::submit('Edit list', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
	
</div>
@endsection
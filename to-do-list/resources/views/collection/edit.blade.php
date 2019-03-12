@extends('layout.app')

@section('content')
<div class="container">
	
	<h1>Edit {{ $collection->title }}</h1>
	
	{{ HTML::ul($errors->all()) }}

	{{ Form::model($collection, array('route' => array('collection.update', $collection->id), 'method' => 'PUT')) }}

	    <div class="form-group">
	        {{ Form::label('name', 'Name') }}
	        {{ Form::text('name', null, array('class' => 'form-control')) }}
	    </div>

	    {{ Form::submit('Edit collection', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
	
</div>
@endsection
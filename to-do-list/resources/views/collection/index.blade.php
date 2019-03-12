@extends('layout.app')

@section('content')
<div class="container">

	<h1>All lists</h1>
	
	<nav class="navbar navbar-inverse">
	    <ul class="nav navbar-nav">
	        <li><a href="{{ URL::to('collection/create') }}">Add list</a>
	    </ul>
	</nav>
	@if (Session::has('message'))
    <div class="alert alert-info ">
    	{{ Session::get('message') }} 
    	<a href="#" class="close float-right" data-dismiss="alert">×</a>
    </div>
	@endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collections as $collection)
            <tr>
                <td>{{ $collection->id }}</td>
                <td><a href="{{URL::to('collection/' . $collection->id)}}">{{ $collection->name }}</a></td>
                <td class="actions">
                    <a class="" href="{{ URL::to('collection/' . $collection->id . '/edit') }}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
					{{ Form::model($collection, array('route' => array('collection.destroy', $collection->id), 'method' => 'DELETE')) }}
                    <button type="submit" value="Delete" class="btn btn-link float-right"><i class="material-icons" data-toggle="tooltip" title="Delete">delete</i></button>
					{{ Form::close() }}	

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
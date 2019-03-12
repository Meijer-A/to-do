@extends('layout.app')

@section('content')
<div class="container">

	<h1>All tasks</h1>
	
	<nav class="navbar navbar-inverse">
	    <ul class="nav navbar-nav">
	        <li><a href="{{ URL::to('task') }}">View All tasks</a></li>
	        <li><a href="{{ URL::to('task/create') }}">Add task</a>
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
                <th>task</th>
                <th>duur(min)</th>
                <th>status</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td><a href="{{URL::to('task/' . $task->id)}}">{{ $task->description }}</a></td>
                <td>{{ $task->duration }}</td>
                <td>{{ $task->status }}</td>
                <td class=>
                    <a class="" href="{{ URL::to('task/' . $task->id . '/edit') }}"><i class="material-icons" data-toggle="tooltip" title="Edit">edit</i></a>
					{{ Form::model($task, array('route' => array('task.destroy', $task->id), 'method' => 'DELETE')) }}
						<button type="submit" value="Delete" class="btn btn-link float-right"><i class="material-icons" data-toggle="tooltip" title="Delete">delete</i></button>
					{{ Form::close() }}	

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">						
					<h4 class="modal-title">Add Song</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				{{ Form::open(array('url' => 'task')) }}

					<div class="form-group">
						{{ Form::label('name', 'name') }}
						{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
					</div>

					{{ Form::submit('voeg lijst toe', array('class' => 'btn btn-primary')) }}

				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
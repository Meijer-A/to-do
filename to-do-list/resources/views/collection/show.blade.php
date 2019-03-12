@extends('layout.app')

@section('content')
    <div class="container">
        <h1>{{$collection->name}}</h1>

    
    <nav class="navbar navbar-inverse">
	    <ul class="nav navbar-nav">
	        <li><a href="{{ URL::to('task/create/' . $collection->id) }}">Add task</a>
		</ul>
	</nav>
	@if (Session::has('message'))
    <div class="alert alert-info ">
    	{{ Session::get('message') }} 
    	<a href="#" class="close float-right" data-dismiss="alert">×</a>
    </div>
	@endif
    <table class="table table-striped table-hover" id="taskTable">
        <thead>
            <tr>
                <th>id</th>
                <th onclick="sortTable(1)" class="sort">task</th>
                <th onclick="sortTable(2)" class="sort">duur(min)</th>
                <th onclick="sortTable(3)" class="sort">status</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection->tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td><a href="{{URL::to('task/' . $task->id)}}">{{ $task->description }}</a></td>
                <td>{{ $task->duration }}</td>
                <td>{{ $task->status }}</td>
                <td class="actions">
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
    

    </div>
@endsection
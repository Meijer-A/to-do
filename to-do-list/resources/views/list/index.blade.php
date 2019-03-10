@extends('layout.app')

@section('content')
<div class="container">

	<h1>All the songs</h1>
	
	<nav class="navbar navbar-inverse">
	    <ul class="nav navbar-nav">
	        <li><a href="{{ URL::to('list') }}">View All Lists</a></li>
	        <li><a href="{{ URL::to('list/create') }}">Add List</a>
	       	<li><a href="#addSong" class="btn btn-success" data-toggle="modal"><span>Add List</span></a></li>
	    </ul>
	</nav>
<!-- 	@if (Session::has('message'))
	<div class="alert alert-danger ">
	{{ HTML::ul($errors->all()) }}
	<a href="#" class="close float-right" data-dismiss="alert">×</a>
	</div>
	@endif  -->
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
            @foreach ($lists as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td><a href="{{URL::to('list/' . $list->id)}}">{{ $list->name }}</a></td>
                <td class="actions">
                    <a class="" href="{{ URL::to('list/' . $list->id . '/edit') }}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

                    <button type="submit" value="Delete" class="btn btn-link "><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="addSong" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">						
					<h4 class="modal-title">Add Song</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
		
			</div>
		</div>
	</div>
@endsection
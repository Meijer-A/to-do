@extends('layouts.app')

@section('content')
<div class="container">

	<h1>All the songs</h1>
	
	<nav class="navbar navbar-inverse">
	    <ul class="nav navbar-nav">
	        <li><a href="{{ URL::to('songs') }}">View All Songs</a></li>
	        <li><a href="{{ URL::to('songs/create') }}">Add a Song</a>
	       	<li><a href="#addSong" class="btn btn-success" data-toggle="modal"><span>Add song</span></a></li>
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
                <th>Artist</th>
                <th>Title</th>
                <th>URL</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song)
            <tr>
                <td>{{ $song->artist }}</td>
                <td>{{ $song->title }}</td>
                <td>{{ $song->url }}</td>
                <td>
                    <a class="" href="{{ URL::to('songs/' . $song->id . '/edit') }}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

                    {{ Form::model($song, array('route' => array('songs.destroy', $song->id), 'method' => 'DELETE')) }}
                    <button type="submit" value="Delete" class="btn btn-link float-right"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                    {{ Form::close() }}	
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
					{{ Form::open(array('url' => 'songs')) }}
					<div class="form-group">
				        {{ Form::label('artist', 'Artist') }}
				        {{ Form::text('artist', Input::old('artist'), array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
				        {{ Form::label('title', 'Title') }}
				        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
				        {{ Form::label('url', 'URL') }}
				        {{ Form::text('url', Input::old('url'), array('class' => 'form-control')) }}
				    </div>
					<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
				    {{ Form::submit('Create song', array('class' => 'btn btn-primary')) }}
					</div>	
					{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection
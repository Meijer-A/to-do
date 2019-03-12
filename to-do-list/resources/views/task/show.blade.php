@extends('layout.app')

@section('content')
    <div class="container">
        <h1>{{$task->description . ' ' . $task->duration . ' minuten ' . $task->status}}</h1>
    </div>
@endsection
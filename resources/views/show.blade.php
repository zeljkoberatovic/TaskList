@extends('layouts.app')

@section('title', $task->title) {{-- sekcije koje ne sadrze Html nego samo text ne moraju se zatvarati--}}
@section('content')

<p>{{ $task->description }}</p>

@if($task->long_description)
    <p>{{ $task->long_description }}</p>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

@endsection
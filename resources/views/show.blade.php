@extends('layouts.app')

@section('title', $task->title) {{-- sekcije koje ne sadrze Html nego samo text ne moraju se zatvarati--}}
@section('content')

    <p>{{ $task->description }}</p>
        @if($task->long_description)
            <p>{{ $task->long_description }}</p>
        @endif

    <p>create {{ $task->created_at }}</p>

    @if ($task->updated_at && $task->created_at != $task->updated_at)
        <p>update {{ $task->updated_at }}</p>
    @endif
@endsection
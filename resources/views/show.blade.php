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

    <p>
        @if($task->completed)
            Completed
        @else
            Not completed
        @endif
    </p>

    <div>
        <a href="{{ route('tasks.edit', ['task' => $task])}}">Edit Task</a>
    </div>

    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>
    </div>
    

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
    </div>
@endsection
<h2>Heloo Blade templete</h2>

<!-- Direktiv isset nam vrsi provjeru odredjene varijable,da li je definisana 
@isset($name)
    <h1>This is name: {{ $name }}</h1>
@endisset
-->

<div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are not task!</div>
    @endforelse
</div>
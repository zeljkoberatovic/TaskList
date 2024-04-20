<?php

use App\Http\Requests\TaskRequest;
Use App\Models\Task;
Use Illuminate\Http\Response;
Use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view('index',[
        'tasks' => Task::latest()->whereNotNull('completed')->get()
    ]);
})->name('tasks.index');


Route::view('/tasks/create', 'create')
     ->name('tasks.create');


Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
      'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
  return view('show', [
    'task' => $task
  ]);
})->name('tasks.show');


Route::post('/tasks', function (TaskRequest  $request) {
  $data = $request->validated();
  //umjesto stvaranja nove instance,svaki pojedinacni atribut moze postaviti sva svojstva odjednom
    //$task = new Task;
    //$task->title = $data['title'];
    //$task->description = $data['description'];
    //$task->long_description = $data['long_description'];
    //$task->save();
  $task = Task::create($request->validated());

  return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created Successfully!'); //dodavanje flash poruke
})->name('tasks.store');



Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
  //$data = $request->validated();--dobijamo podatke iz TaskReques--Ovo je korisno kada želimo da pristupimo samo validiranim podacima
    //$task->title = $data['title'];
    //$task->description = $data['description'];
    //$task->long_description = $data['long_description'];
    //$task->save();
    //Imamo metodu koja vrsi azuriranje,radi isto sto 
    $task->update($request->validated());

  return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated Successfully!'); 
})->name('tasks.update');








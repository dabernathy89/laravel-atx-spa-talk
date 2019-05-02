<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $lists = \App\TodoList::all();

    return view('home')
        ->with(['lists' => $lists]);
});

Route::post('/lists', function (\Illuminate\Http\Request $request) {
    $list = \App\TodoList::create([
        'title' => $request->input('title'),
    ]);

    return response()->json($list);
});

Route::get('/lists/{list}', function (\App\TodoList $list) {
    return view('todos')
        ->with(['list' => $list, 'todos' => $list->todos, 'filter' => 'all']);
});

Route::get('/lists/{list}/active', function (\App\TodoList $list) {
    $todos = $list->todos()->whereCompleted(0)->get();

    return view('todos')
        ->with(['list' => $list, 'todos' => $todos, 'filter' => 'active']);
});

Route::get('/lists/{list}/completed', function (\App\TodoList $list) {
    $todos = $list->todos()->whereCompleted(1)->get();

    return view('todos')
        ->with(['list' => $list, 'todos' => $todos, 'filter' => 'completed']);
});

Route::delete('/lists/{list}', function (\App\TodoList $list) {
    $list->delete();

    return response()->json(['success' => true]);
});

Route::post('/lists/{list}', function (\Illuminate\Http\Request $request, \App\TodoList $list) {
    $todo = \App\Todo::create([
        'title' => $request->input('title'),
        'completed' => false,
        'todo_list_id' => $list->id,
    ]);

    return response()->json($todo);
});

Route::patch('/lists/{list}/{todo}', function (\Illuminate\Http\Request $request, \App\TodoList $list, \App\Todo $todo) {
    if ($request->has('completed')) {
        $todo->completed = $request->input('completed');
    }

    $todo->save();

    return response()->json($todo);
});

Route::delete('/lists/{list}/{todo}', function (\App\TodoList $list, \App\Todo $todo) {
    $todo->delete();

    return response()->json(['success' => true]);
});

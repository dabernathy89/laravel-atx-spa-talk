@extends('layouts.app')

@section('content')
    <section class="todoapp">
        <header class="header">
            <h1>todo lists</h1>
            <form method="POST" action="/lists">
                {{ csrf_field() }}
                <input class="new-todo" name="title" placeholder="Add a new list" autofocus>
            </form>
        </header>
        <!-- This section should be hidden by default and shown when there are todos -->
        <section class="main">
            <ul class="todo-list">
                <!-- These are here just to show the structure of the list items -->
                <!-- List items should get the class `editing` when editing and `completed` when marked as completed -->
                @foreach($lists as $list)
                    <li>
                        <div class="view">
                            <a class="edit-list" href="/lists/{{ $list->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <label>{{ $list->title }}</label>
                            <form method="POST" action="/lists/{{ $list->id }}">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="destroy"></button>
                            </form>
                        </div>
                        <input class="edit" value="{{ $list->title }}">
                    </li>
                @endforeach
            </ul>
        </section>
    </section>
@endsection

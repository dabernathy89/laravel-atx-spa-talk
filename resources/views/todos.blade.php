@extends('layouts.app')

@section('content')
    <section class="todoapp">
        <header class="header">
            <h1>todos</h1>
            <form method="POST" action="/lists/{{ $list->id }}">
                {{ csrf_field() }}
                <input class="new-todo" name="title" placeholder="What needs to be done?" autofocus>
                <input type="hidden" name="completed" value="0">
            </form>
        </header>
        <!-- This section should be hidden by default and shown when there are todos -->
        <section class="main">
            <ul class="todo-list">
                <!-- These are here just to show the structure of the list items -->
                <!-- List items should get the class `editing` when editing and `completed` when marked as completed -->
                @foreach($todos->where('completed', true) as $todo)
                    <li class="completed">
                        <div class="view">
                            <form method="POST" action="/lists/{{ $list->id }}/{{ $todo->id }}">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <input class="toggle" name="completed" type="checkbox" checked>
                                <label>{{ $todo->title }}</label>
                            </form>

                            <form method="POST" action="/lists/{{ $list->id }}/{{ $todo->id }}">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="destroy"></button>
                            </form>
                        </div>
                    </li>
                @endforeach
                @foreach($todos->where('completed', false) as $todo)
                    <li>
                        <div class="view">
                            <form method="POST" action="/lists/{{ $list->id }}/{{ $todo->id }}">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <input class="toggle" name="completed" type="checkbox">
                                <label>{{ $todo->title }}</label>
                            </form>
                            <form method="POST" action="/lists/{{ $list->id }}/{{ $todo->id }}">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="destroy"></button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
        <!-- This footer should hidden by default and shown when there are todos -->
        <footer class="footer">
            <!-- Remove this if you don't implement routing -->
            <ul class="filters">
                <li>
                    <a @if($filter === 'all') class="selected" @endif href="/lists/{{ $list->id }}">All</a>
                </li>
                <li>
                    <a @if($filter === 'active') class="selected" @endif href="/lists/{{ $list->id }}/active">Active</a>
                </li>
                <li>
                    <a @if($filter === 'completed') class="selected" @endif href="/lists/{{ $list->id }}/completed">Completed</a>
                </li>
            </ul>
        </footer>
    </section>
    <footer class="info">
        <p><a href="/">Home</a></p>
    </footer>
@endsection

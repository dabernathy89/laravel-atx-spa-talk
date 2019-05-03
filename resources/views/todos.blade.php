@extends('layouts.app')

@section('content')
    <section class="todoapp" id="todolist-single">
        <header class="header">
            <h1>todos</h1>
            <input class="new-todo" name="title" v-model="todo_title" placeholder="Add a new todo" autofocus @keyup.enter="create">
        </header>
        <!-- This section should be hidden by default and shown when there are todos -->
        <section class="main">
            <ul class="todo-list">
                <!-- These are here just to show the structure of the list items -->
                <!-- List items should get the class `editing` when editing and `completed` when marked as completed -->

                    <li v-if="$router.currentRoute.name !== 'active'" v-for="(todo, index) in completed" class="completed" v-bind:key="todo.id">
                        <div class="view">
                            <input class="toggle" name="completed" type="checkbox" checked @change="markActive(todo.id, index)">
                            <label>@{{ todo.title }}</label>

                            <button class="destroy" @click="remove(todo.id, index)"></button>
                        </div>
                    </li>

                    <li v-if="$router.currentRoute.name !== 'completed'" v-for="(todo, index) in active" v-bind:key="todo.id">
                        <div class="view">
                            <input class="toggle" name="completed" type="checkbox" @change="markComplete(todo.id, index)">
                            <label>@{{ todo.title }}</label>

                            <button class="destroy" @click="remove(todo.id, index)"></button>
                        </div>
                    </li>

            </ul>
        </section>
        <!-- This footer should hidden by default and shown when there are todos -->
        <footer class="footer">
            <!-- Remove this if you don't implement routing -->
            <ul class="filters">
                <li>
                    <router-link :to="{ name: 'all', params: { list_id: list.id }}">All</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'active', params: { list_id: list.id }}">Active</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'completed', params: { list_id: list.id }}">Completed</router-link>
                </li>
            </ul>
        </footer>
    </section>
    <footer class="info">
        <p><a href="/">Home</a></p>
    </footer>
@endsection

@section('scripts')
<script>
    var todo_list = @json($list);
    var todos = @json($todos);
</script>
@endsection
@extends('layouts.app')

@section('content')
    <section class="todoapp">
        <header class="header">
            <h1>todo lists</h1>
            <input class="new-todo" name="title" v-model="list_title" placeholder="Add a new list" autofocus @keyup.enter="create">
        </header>
        <!-- This section should be hidden by default and shown when there are todos -->
        <section class="main">
            <ul class="todo-list">
                <!-- These are here just to show the structure of the list items -->
                <!-- List items should get the class `editing` when editing and `completed` when marked as completed -->
                    <li v-for="(list, index) in lists">
                        <div class="view">
                            <a class="edit-list" :href="'/lists/' + list.id">
                                <i class="fas fa-edit"></i>
                            </a>
                            <label>@{{ list.title }}</label>
                            <button class="destroy" @click="remove(list.id, index)"></button>
                        </div>
                    </li>
            </ul>
        </section>
    </section>
@endsection

@section('scripts')
<script>
    var todo_lists = @json($lists);
</script>
@endsection
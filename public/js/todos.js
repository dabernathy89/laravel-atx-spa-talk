if (document.getElementById('todolist-home')) {
    var app = new Vue({
        el: '#app',
        data: {
            list_title: '',
            lists: window.todo_lists || [],
        },
        methods: {
            create() {
                axios.post('/lists/', {
                        'title': this.list_title
                    })
                    .then((response) => {
                        this.lists.push(response.data);
                        this.list_title = '';
                    });
            },

            remove(list_id, index) {
                axios.delete('/lists/' + list_id)
                    .then((response) => {
                        this.lists.splice(index, 1);
                    });
            }
        }
    });
}

if (document.getElementById('todolist-single')) {
    var app = new Vue({
        el: '#app',
        data: {
            todo_title: '',
            list: window.todo_list || null,
            todos: window.todos || [],
        },
        computed: {
            active() {
                return this.todos.filter(todo => !todo.completed);
            },

            completed() {
                return this.todos.filter(todo => todo.completed);
            }
        },
        methods: {
            create() {
                axios.post('/lists/' + this.list.id, {
                        'title': this.todo_title,
                        'completed': false
                    })
                    .then((response) => {
                        this.todos.push(response.data);
                        this.todo_title = '';
                    });
            },

            markComplete(todo_id, index) {
                axios.patch('/lists/' + this.list.id + '/' + todo_id, {
                        'completed': true
                    })
                    .then((response) => {
                        this.todos[index].completed = true;
                    });
            },

            markActive(todo_id, index) {
                axios.patch('/lists/' + this.list.id + '/' + todo_id, {
                        'completed': false
                    })
                    .then((response) => {
                        this.todos[index].completed = false;
                    });
            },

            remove(todo_id, index) {
                axios.delete('/lists/' + this.list.id + '/' + todo_id)
                    .then((response) => {
                        this.todos.splice(index, 1);
                    });
            }
        }
    });
}
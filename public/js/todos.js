(function (window) {
	'use strict';

	$('input[type="checkbox"].toggle').on('change', function (e) {
        $(e.currentTarget).parent('form').submit();
    });

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
    })

})(window);

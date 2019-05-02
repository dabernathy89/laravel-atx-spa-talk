(function (window) {
	'use strict';

	$('input[type="checkbox"].toggle').on('change', function (e) {
        $(e.currentTarget).parent('form').submit();
    });

    var app = new Vue({
        el: '#app',
        data: {
            lists: window.todo_lists || [],
        }
    })

})(window);

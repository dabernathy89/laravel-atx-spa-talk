(function (window) {
	'use strict';

	$('input[type="checkbox"].toggle').on('change', function (e) {
        $(e.currentTarget).parent('form').submit();
    });

})(window);

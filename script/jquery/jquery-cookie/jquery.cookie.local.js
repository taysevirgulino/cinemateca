(function ($, document, undefined) {

	var pluses = /\+/g;

	function raw(s) {
		return s;
	}

	function decoded(s) {
		return decodeURIComponent(s.replace(pluses, ' '));
	}

	var config = $.cookie = function (key, value, options) {

		// write
		if (value !== undefined) {

			value = config.json ? JSON.stringify(value) : String(value);

			window.localStorage.setItem(key, value);
			
			return true;
		}

		// read
		var cookie = window.localStorage.getItem( key );
		
		return config.json ? JSON.parse(cookie) : cookie;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) !== null) {
			window.localStorage.removeItem( key );
			return true;
		}
		return false;
	};

})(jQuery, document);

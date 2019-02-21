(function () {
	'use strict';

	var urls = [
		"api.php"
	], req, API, callData;

	req = function (data, success, error, retry) {
		retry = retry || 0;
		return $.ajax({
			jsonp: "callback",
			dataType: "jsonp",
			url: urls[retry % urls.length],
			data: data,
			success: success,
			error: function (xhr) {
				if (retry < urls.length - 1) {
					req(data, success, error, retry += 1);
				} else {
					error(xhr);
				}
			}
		});
	};
	
	callData = function(methodName, parameters){
		return "data="+encode64(JSON.stringify({'s':'API', 'm':methodName, "p":parameters}));
	}
	
	API = {
		urls: urls,
		lojistaEtapaUpdate: function (ideLojista, ideEtapa, status, data, success, error) {
			return req(
				callData('lojistaEtapaUpdate', [ideLojista, ideEtapa, status, data]), 
				success, 
				error
			);
		},
		lojistaPessoaSenha: function (ideLojistaPessoa, success, error) {
			return req(
				callData('lojistaPessoaSenha', [ideLojistaPessoa]), 
				success, 
				error
			);
		},
		lojistaCronogramaPrevisao: function (formData, success, error) {
			return req(
				callData('lojistaCronogramaPrevisao', [formData]), 
				success, 
				error
			);
		},
	};

	window.API = API;

}());
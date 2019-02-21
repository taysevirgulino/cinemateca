$(function(){
	
	/**
	 * MASCARAS
	 */
	$('.telefone').focusout(function(){
		var phone, element;
		element = $(this);
		element.unmask();
		phone = element.val().replace(/\D/g, '');
		if(phone.length > 10) {
			element.mask("(99) 99999-999?9");
		} else {
			element.mask("(99) 9999-9999?9");
		}
	}).trigger('focusout');	
	$(".cpf").mask("999.999.999-99");
	$(".cep").mask("99999-999");
	$(".cnpj").mask("99.999.999/9999-99");
	$(".date").mask("99/99/9999");
	$(".datetime").mask("99/99/9999 99:99:99");
	$(".time").mask("99:99:99");
	
	/**
	 * PLUGINS
	 */
	$('select').select2 ({
		allowClear: true,
		placeholder: "Selecionar..."
	});
	$('input:checkbox, input:radio').iCheck({
		checkboxClass: 'icheckbox_minimal-green',
		radioClass: 'iradio_minimal-green',
		inheritClass: true
	});
	
	$("#listagem").find("a.excluir").click(function(e) {
		var title = $(this).attr("data-title");
		return window.confirm("Deseja realmente excluir: "+title);
	});
	
});
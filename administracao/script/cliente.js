Endereco = {
	Count : 0,
	Novo : function(){
		Endereco.Count++;
		Endereco.Adicionar([{"id_cliente_endereco":Endereco.Count}]);
    },
	Remover : function(id){
		$("#endereco_"+id).css("display", "none");
		$("#FrmEnderecoRemover_"+id).val("1");
    },
    Adicionar : function(enderecos){
		$("#endereco_item").tmpl(enderecos).appendTo("#enderecos");
		
		for (var i=0; i < enderecos.length; i++){
			$("#FrmIdLocalidade_"+enderecos[i]["id_cliente_endereco"]).val(enderecos[i]["id_localidade"]);
			$("#FrmEndereco_"+enderecos[i]["id_cliente_endereco"]).val(enderecos[i]["endereco"]);
			
			$("#FrmIdEndereco_"+enderecos[i]["id_cliente_endereco"]).val( ((enderecos[i]["id_localidade"] != "") ? enderecos[i]["id_cliente_endereco"] : "" ) );
			$("#FrmNumero_"+enderecos[i]["id_cliente_endereco"]).val(enderecos[i]["numero"]);
			$("#FrmComplemento_"+enderecos[i]["id_cliente_endereco"]).val(enderecos[i]["complemento"]);
			$("#FrmBairro_"+enderecos[i]["id_cliente_endereco"]).val(enderecos[i]["bairro"]);
			$("#FrmCep_"+enderecos[i]["id_cliente_endereco"]).val(enderecos[i]["cep"]);
			if(enderecos[i]["principal"] == 1){
				$("#FrmPrincipal_"+enderecos[i]["id_cliente_endereco"]).attr("checked", "checked");
			}
		}
    }
}

$(function(){

	$("#FrmCpf").focusout(function(e) {
		$.ajax({
			type:	"POST", url: 'ajax.php',
			data:	"function=Cliente_Cpf_Existe&cpf="+$(this).val(),
			complete: function(data){
				if(data.responseText === "true"){
					alert("O CPF "+$("#FrmCpf").val()+" já está cadastrado. Informe outro ou edite o existente.");
					$("#FrmCpf").val("");
				}
			}
		});
	});
	$("#FrmEmail").focusout(function(e) {
		$.ajax({
			type:	"POST", url: 'ajax.php',
			data:	"function=Cliente_Email_Existe&email="+$(this).val(),
			complete: function(data){
				if(data.responseText === "true"){
					alert("O E-mail "+$("#FrmEmail").val()+" já está cadastrado. Informe outro ou edite o existente.");
					$("#FrmEmail").val("");
				}
			}
		});
	});
	$("#FrmLogin").focusout(function(e) {
		$.ajax({
			type:	"POST", url: 'ajax.php',
			data:	"function=Cliente_Login_Existe&login="+$(this).val(),
			complete: function(data){
				if(data.responseText === "true"){
					alert("O Login "+$("#FrmLogin").val()+" já está cadastrado. Informe outro ou edite o existente.");
					$("#FrmLogin").val("");
				}
			}
		});
	});

});


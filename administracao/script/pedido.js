Pedido = {
    Load: function () {
		$('#FrmValorFrete,#FrmValorTroco').priceFormat({
			prefix: '',
			centsSeparator: ',',
			thousandsSeparator: '.'
		});
        
		$("#FrmValorFrete").change(function(e){
			Pedido.Atualizar_Valores();
		});
    },
	Adicionar_Produto : function(produto){
		$("#produto_item_no").hide();
		var iten = $("#produto_value_"+produto.id_pedido_produto).val();
		if(iten != null){
			$("#linha_"+produto.id_pedido_produto).html( produto.linha );
			$("#titulo_"+produto.id_pedido_produto).html( produto.titulo );
			$("#quantidade_"+produto.id_pedido_produto).html( produto.quantidade );
			$("#valor_bruto_"+produto.id_pedido_produto).html( produto.valor_bruto );
			$("#valor_acrescimo_"+produto.id_pedido_produto).html( produto.valor_acrescimo );
			$("#valor_desconto_"+produto.id_pedido_produto).html( produto.valor_desconto );
			$("#valor_final_"+produto.id_pedido_produto).html( produto.valor_final );
			$("#data_locacao_"+produto.id_pedido_produto).html( produto.data_locacao );
			$("#data_devolucao_"+produto.id_pedido_produto).html( produto.data_devolucao );			
		}else{
			$("#produto_item").tmpl(produto).appendTo("#produtos");
		}
		
		$("#produto_value_"+produto.id_pedido_produto).val( JSON.stringify(produto) );
	},
	Excluir_Produto : function(IdPedidoProduto){
		$("#tr_"+IdPedidoProduto).remove();
	},
	Atualizar : function(pedido){
		$("#FrmValorBruto").val( pedido.valor_bruto );
		$("#FrmValorAcrescimo").val( pedido.valor_acrescimo );
		$("#FrmValorDesconto").val( pedido.valor_desconto );
		//$("#FrmValorFinal").val( pedido.valor_final );
		
		Pedido.Atualizar_Valores();
	},
	Atualizar_Valores : function() {
		var ValorBruto = PedidoProduto.ParseFloat( $("#FrmValorBruto").val() );
		var ValorAcrescimo = PedidoProduto.ParseFloat( $("#FrmValorAcrescimo").val() );
		var ValorFrete = PedidoProduto.ParseFloat( $("#FrmValorFrete").val() );
		var ValorDesconto = PedidoProduto.ParseFloat( $("#FrmValorDesconto").val() );
		
		var ValorFinal = (ValorBruto + ValorAcrescimo + ValorFrete) - ValorDesconto;
		
		$("#FrmValorFinal").val( moeda_format(ValorFinal) );
	}
}

PedidoProduto = {
	IdPedidoProduto : 0,
	IdProdutoEstoque : 0,
	IdProduto : 0,
	Titulo : "",
	Linha : "",
	Quantidade : 0,
	ValorProduto : 0,
	ValorBruto : 0,
	ValorDesconto : 0,
	ValorAcrescimo : 0,
	ValorFinal : 0,
	DataLocacao : "",
	DataDevolucao : "",
	Load: function(){
		$("#dialog:ui-dialog").dialog("destroy");
        $("#dialog-form-add").dialog({
            autoOpen: false,
            height: 300,
            width: 650,
            modal: true,
            buttons: {
                "Salvar": function () {
                    PedidoProduto.Salvar(function () {
                        $("#dialog-form-add").dialog("close");
                    });
                },
                "Cancelar": function () {
                    $(this).dialog("close");
                }
            },
            close: function () {}
        });
        $("#add-produto").click(function () {
            PedidoProduto.Zerar();
			$("#dialog-form-add").dialog("open");
        });		
		
		PedidoProduto.Zerar();
		
        $("#FrmEstoqueDataLocacao,#FrmEstoqueDataDevolucao").mask("99/99/9999");
		$('#FrmEstoqueValorAcrescimo,#FrmEstoqueValorDesconto').priceFormat({
			prefix: '',
			centsSeparator: ',',
			thousandsSeparator: '.'
		});
		$("#FrmEstoqueQuantidade").focusout(function(e){
			PedidoProduto.Quantidade = parseInt( $(this).val() );
			PedidoProduto.Campos_Atualizar();
		});
		$("#FrmEstoqueDataLocacao").change(function(e){
			PedidoProduto.DataLocacao = $(this).val();
			PedidoProduto.Campos_Atualizar();
		});
		$("#FrmEstoqueDataDevolucao").change(function(e){
			PedidoProduto.DataDevolucao = $(this).val();
			PedidoProduto.Campos_Atualizar();
		});
		$("#FrmEstoqueValorAcrescimo").focusout(function(e){
			PedidoProduto.ValorAcrescimo = PedidoProduto.ParseFloat( $(this).val() );
			PedidoProduto.Campos_Atualizar();
		});
		$("#FrmEstoqueValorDesconto").focusout(function(e){
			PedidoProduto.ValorDesconto = PedidoProduto.ParseFloat( $(this).val() );
			PedidoProduto.Campos_Atualizar();
		});
	},
	Editar : function(IdPedidoProduto){
		var pedidoProduto = $("#produto_value_"+IdPedidoProduto).val();
		if(pedidoProduto != ""){
			pedidoProduto = JSON.parse(pedidoProduto);
			
			PedidoProduto.Preencher(pedidoProduto.id_pedido_produto, pedidoProduto.id_produto_estoque, pedidoProduto.id_produto, pedidoProduto.titulo, pedidoProduto.linha, pedidoProduto.quantidade, PedidoProduto.ParseFloat(pedidoProduto.valor_produto), PedidoProduto.ParseFloat(pedidoProduto.valor_bruto), PedidoProduto.ParseFloat(pedidoProduto.valor_desconto), PedidoProduto.ParseFloat(pedidoProduto.valor_acrescimo), pedidoProduto.data_locacao, pedidoProduto.data_devolucao);
			
			$("#dialog-form-add").dialog("open");
		}
	},
	Load_Calendario : function(){
		$("#carregandoForm").show();
		$.ajax({
			url: "ajax.php?function=Datas_Locacao_Json",
			dataType: "jsonp",
			data: {
				produto_estoque: PedidoProduto.IdProdutoEstoque,
				unidade: $("#FrmIdUnidade").val()
			},
			success: function (data) {
				$("#carregandoForm").hide();
				var daysToEnable = data;
				$("#FrmEstoqueDataLocacao,#FrmEstoqueDataDevolucao").datepicker({
					beforeShowDay: function(date){
						var dateString = date.toISOString().substring(0, 10);
						for (i = 0; i < daysToEnable.length; i++) {
							if(daysToEnable[i] == dateString){
								return [true];
							}
						}
						return [false];
					},
					dateFormat: 'dd/mm/yy'
				});
			}
		});
	
	},
	Contabilizar : function(){
		PedidoProduto.ValorBruto = parseFloat(PedidoProduto.ValorProduto) * parseInt(PedidoProduto.Quantidade);
		PedidoProduto.ValorFinal = (PedidoProduto.ValorBruto + parseFloat(PedidoProduto.ValorAcrescimo)) - parseFloat(PedidoProduto.ValorDesconto);
	},
	Preencher: function(IdPedidoProduto, IdProdutoEstoque, IdProduto, Titulo, Linha, Quantidade, ValorProduto, ValorBruto, ValorDesconto, ValorAcrescimo, DataLocacao, DataDevolucao){
		PedidoProduto.IdPedidoProduto = ((IdPedidoProduto!=null) ? IdPedidoProduto : PedidoProduto.IdPedidoProduto );
		PedidoProduto.IdProdutoEstoque = IdProdutoEstoque;
		PedidoProduto.IdProduto = IdProduto;
		PedidoProduto.Titulo = Titulo;
		PedidoProduto.Linha = Linha;
		PedidoProduto.Quantidade = Quantidade;
		PedidoProduto.ValorProduto = ValorProduto;
		PedidoProduto.ValorBruto = ValorBruto;
		PedidoProduto.ValorDesconto = ValorDesconto;
		PedidoProduto.ValorAcrescimo = ValorAcrescimo;
		PedidoProduto.DataLocacao = DataLocacao;
		PedidoProduto.DataDevolucao = DataDevolucao;
		
		PedidoProduto.Campos_Atualizar();
		PedidoProduto.Load_Calendario();
	},
	Campos_Atualizar : function(){
		PedidoProduto.Contabilizar();
		
		$("#FrmEstoqueIdPedidoProduto").val( PedidoProduto.IdPedidoProduto );
		$("#FrmEstoqueProduto").val( PedidoProduto.Titulo );
		$("#FrmEstoqueIdProduto").val( PedidoProduto.IdProduto );
		$("#FrmEstoqueIdProdutoEstoque").val( PedidoProduto.IdProdutoEstoque );
		$("#FrmEstoqueLinha").val( PedidoProduto.Linha );
		$("#FrmEstoqueQuantidade").val( PedidoProduto.Quantidade );
		$("#FrmEstoqueValorBruto").val( moeda_format(PedidoProduto.ValorBruto) );
		$("#FrmEstoqueValorAcrescimo").val( moeda_format(PedidoProduto.ValorAcrescimo) );
		$("#FrmEstoqueValorDesconto").val( moeda_format(PedidoProduto.ValorDesconto) );
		$("#FrmEstoqueValorFinal").val( moeda_format(PedidoProduto.ValorFinal) );
		$("#FrmEstoqueDataLocacao").val( PedidoProduto.DataLocacao );
		$("#FrmEstoqueDataDevolucao").val( PedidoProduto.DataDevolucao );
	},
	Zerar : function(){
		PedidoProduto.IdPedidoProduto = 0;
		PedidoProduto.IdProdutoEstoque = 0;
		PedidoProduto.IdProduto = 0;
		PedidoProduto.Titulo = "";
		PedidoProduto.Linha = "";
		PedidoProduto.Quantidade = 0;
		PedidoProduto.ValorProduto = 0;
		PedidoProduto.ValorBruto = 0;
		PedidoProduto.ValorDesconto = 0;
		PedidoProduto.ValorAcrescimo = 0;
		PedidoProduto.DataLocacao = "";
		PedidoProduto.DataDevolucao = "";
		
		PedidoProduto.Campos_Atualizar();
	},
	ParseFloat : function(valor){
		valor = valor.replace(".", "");
		valor = valor.replace(",", ".");
		return parseFloat(valor);
	},
    Salvar: function (callback) {
        var alert = $("#dialog-form-add-alert");
        var msg = "";

        if (PedidoProduto.IdProdutoEstoque <= 0) {
            alert.text("Preencha o Produto").addClass("ui-state-error");
            return false;
        }
        if (PedidoProduto.Quantidade <= 0) {
            alert.text("Informe a Quantidade").addClass("ui-state-error");
            return false;
        }
        if (PedidoProduto.DataLocacao == "") {
            alert.text("Preencha a data de Locação").addClass("ui-state-error");
            return false;
        }
		if (PedidoProduto.DataDevolucao == "") {
            alert.text("Preencha a data de Devolução").addClass("ui-state-error");
            return false;
        }

        if (msg.length <= 0) {
            var carregando = $("#carregandoForm");
            carregando.show();
			
			var data = {
				"function": 'PedidoProduto_Gerenciar',
				"id_pedido" : $("#FrmIdPedido").val(),
				"form": $("#FormPedidoProduto").serialize()
			};

            $.post("ajax.php", data, function (rs) {

                if (rs.erro == "")
                {
                    alert.removeClass("ui-state-error");                    
                    carregando.hide();
					
                    Pedido.Adicionar_Produto( rs.produto );
					Pedido.Atualizar( rs.pedido );
					
                    if (callback && typeof (callback) === "function") {
                        callback();
                    }
                }else{
                    alert.text( rs.erro ).addClass("ui-state-error");
                }

            }, "json");
        }
    },
    Excluir: function (IdPedidoProduto) {
        if(confirm("Deseja realmente excluir esse produto?")){
			var carregando = $("#carregandoCarrinho");
            carregando.show();
			
			var data = {
				"function": 'PedidoProduto_Excluir',
				"id_pedido" : $("#FrmIdPedido").val(),
				"id_pedido_produto": IdPedidoProduto
			};

            $.post("ajax.php", data, function (rs) {

                if (rs.erro == "")
                {
                    Pedido.Excluir_Produto( IdPedidoProduto );
					Pedido.Atualizar( rs.pedido );
					
	                carregando.hide();
	            }else{
                    alert( rs.erro );
                }

            }, "json");
		}
    }
}

Autocomplete_Produto = {
    Load: function (controlText, controlValue, controlNext, controlLoader, callback) {
        $(controlText).autocomplete({
            source: function (request, response) {
                $(controlValue).val("");
                $(controlLoader).show();
                $.ajax({
                    url: "ajax.php?function=Autocomplete_Produto_Estoque",
                    dataType: "jsonp",
                    data: {
                        maxRows: 12,
                        chave: request.term,
						unidade: $("#FrmIdUnidade").val()
                    },
                    success: function (data) {
                        $(controlLoader).hide();
                        response($.map(data, function (item) {
                            return {
                                label: item.linha+" | "+item.titulo,
                                value: item.titulo,
								id_produto: item.id_produto,
                                id_produto_estoque: item.id_produto_estoque,
                                titulo: item.titulo,
                                linha: item.linha,
                                valor: item.valor,
                                estoque: item.estoque
                            }
                        }));
                    }
                });
            },
            minLength: 3,
            select: function (event, ui) {
				
				PedidoProduto.Preencher(null, ui.item.id_produto_estoque, ui.item.id_produto, ui.item.titulo, ui.item.linha, 1, ui.item.valor, ui.item.valor, 0, 0, "", "");
			
                $(controlNext).focus(); 
				if (callback && typeof(callback) === "function") {  
					callback();  
				}                    
            },
            open: function () {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
    }
}

$.datepicker.regional['pt-BR'] = {
		closeText: 'Fechar',
		prevText: '&#x3c;Anterior',
		nextText: 'Pr&oacute;ximo&#x3e;',
		currentText: 'Hoje',
		monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
		'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
		'Jul','Ago','Set','Out','Nov','Dez'],
		dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
		dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
		weekHeader: 'Sm',
		dateFormat: 'dd-mm-yy',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['pt-BR']);
										


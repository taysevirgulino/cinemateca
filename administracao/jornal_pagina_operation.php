<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$op_count = intval(System::_POST("OperacaoCount"));
	$op_opcao = System::_POST("OperacaoOpcao");
	$op_botao = System::_POST("OperacaoBotao");
	$link_add = "jornal_pagina_add.php";
	$link_edit = "jornal_pagina_edit.php";
	$link_remove = "jornal_pagina_remove.php";
	$link_list = "jornal_pagina_list.php";

	if($op_count > 0){
		$itens = array();
		$cont=0;
		for ($i=0; $i < $op_count; $i++){
			$aux = intval($_POST["CheckBoxIdOperacao$i"]);
			if($aux > 0){
				$itens[$cont++] = $aux;
			}
		}
		if(count($itens) > 0){

			switch ($op_opcao){
				case "excluir" : {
					for ($i=0; $i < count($itens); $i++){
						JornalPaginaManage::excluirJornalPagina($itens[$i]);
					}
				}break;
			}

			System::AlertRedirect("Operação executada com sucesso!", $link_list);
		}else{
			System::AlertRedirect("Nenhum registro selecionado!", $link_list);
		}
	}else{
		System::AlertRedirect("Nenhum registro selecionado!", $link_list);
	}
?>
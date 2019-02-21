<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$op_count = intval(System::_POST("OperacaoCount"));
	$op_opcao = System::_POST("OperacaoOpcao");
	$op_botao = System::_POST("OperacaoBotao");
	$link_add = "acesso_rapido_bloco_add.php";
	$link_edit = "acesso_rapido_bloco_edit.php";
	$link_remove = "acesso_rapido_bloco_remove.php";
	$link_list = "acesso_rapido_bloco_list.php";

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
						AcessoRapidoBlocoManage::excluirAcessoRapidoBloco($itens[$i]);
					}
				}break;
				case "prioridade" : {
					if(count($itens) >= 2){
						$obj_atual = new AcessoRapidoBloco();
						if(!$obj_atual->buscarAcessoRapidoBloco(1, $itens[0])){ System::Redirect($link_list); }

						$obj_alterar = new AcessoRapidoBloco();
						if(!$obj_alterar->buscarAcessoRapidoBloco(1, $itens[1])){ System::Redirect($link_list); }

						$aux = $obj_atual->getPrioridade();
						$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
						$obj_alterar->setPrioridade( $aux );

						$obj_atual->alterarAtributoPrioridade();
						$obj_alterar->alterarAtributoPrioridade();
					}else{
						System::AlertRedirect("Selecione no mínimo dois registros!", $link_list);
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
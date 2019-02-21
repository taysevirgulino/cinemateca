<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$op_count = intval(System::_POST("OperacaoCount"));
	$op_opcao = System::_POST("OperacaoOpcao");
	$op_botao = System::_POST("OperacaoBotao");
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "tempo_cidade_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "tempo_cidade_add.php?back=$link_back";
	$link_edit = "tempo_cidade_edit.php?back=$link_back";
	$link_remove = "tempo_cidade_remove.php?back=$link_back";

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
						TempoCidadeManage::excluirTempoCidade($itens[$i]);
					}
				}break;
				case "prioridade" : {
					if(count($itens) >= 2){
						$obj_atual = new TempoCidade();
						if(!$obj_atual->buscarTempoCidade(1, $itens[0])){ System::Redirect($link_list); }

						$obj_alterar = new TempoCidade();
						if(!$obj_alterar->buscarTempoCidade(1, $itens[1])){ System::Redirect($link_list); }

						$aux = $obj_atual->getPrioridade();
						$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
						$obj_alterar->setPrioridade( $aux );

						$obj_atual->alterarAtributoPrioridade();
						$obj_alterar->alterarAtributoPrioridade();
					}else{
						System::AlertRedirect("Selecione no mínimo dois registros!", $link_list);
					}
				}break;
				case "status" : {
					for ($i=0; $i < count($itens); $i++){
						$obj = new TempoCidade();
						if($obj->buscarTempoCidade(1, $itens[$i])){
							$obj->setStatus( (($obj->getStatus()==1) ? 0 : 1 ) );
							$obj->alterarAtributoStatus();
						}
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
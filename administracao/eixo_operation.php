<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$op_count = intval(System::_POST("OperacaoCount"));
	$op_opcao = System::_POST("OperacaoOpcao");
	$op_botao = System::_POST("OperacaoBotao");
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "eixo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "eixo_add.php?back=$link_back";
	$link_edit = "eixo_edit.php?back=$link_back";
	$link_remove = "eixo_remove.php?back=$link_back";

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
						EixoManage::excluirEixo($itens[$i]);
					}
				}break;
				case "status" : {
					for ($i=0; $i < count($itens); $i++){
						$obj = new Eixo();
						if($obj->buscarEixo(1, $itens[$i])){
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
<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$IDA = intval(System::_REQUEST("ida"));
	$objAlbum = new GaleriaAlbum();
	if(!$objAlbum->buscarGaleriaAlbum(1, $IDA)){ System::Redirect("galeria_album_list.php"); }
	$album_label = $objAlbum->getNome();

	$op_count = intval(System::_POST("OperacaoCount"));
	$op_opcao = System::_POST("OperacaoOpcao");
	$op_botao = System::_POST("OperacaoBotao");
	$link_add = "galeria_foto_add.php?ida=$IDA";
	$link_edit = "galeria_foto_edit.php?ida=$IDA";
	$link_remove = "galeria_foto_remove.php?ida=$IDA";
	$link_list = "galeria_foto_list.php?ida=$IDA";

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
						GaleriaFotoManage::excluirGaleriaFoto($itens[$i]);
					}
				}break;
				case "prioridade" : {
					if(count($itens) >= 2){
						$obj_atual = new GaleriaFoto();
						if(!$obj_atual->buscarGaleriaFoto(1, $itens[0])){ System::Redirect($link_list); }
					
						$obj_alterar = new GaleriaFoto();
						if(!$obj_alterar->buscarGaleriaFoto(1, $itens[1])){ System::Redirect($link_list); }
					
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
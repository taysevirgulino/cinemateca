<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_contato_add.php";
	$link_edit = "emkt_contato_edit.php?id=$ID";
	$link_remove = "emkt_contato_remove.php?id=$ID";
	$link_list = "emkt_contato_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new EmktContato();
	if(!$obj->buscarEmktContato(1, $ID)){ System::Redirect($link_list); }

	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::_POST("FrmEmail");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$frm_qtd_listas = intval($_POST["qtdListas"]);
	$vlistas = array(); $vi = 0;
	for($i=0; $i < $frm_qtd_listas; $i++){
		$value = intval($_POST["rbLista".$i]);
		if(!empty($value)){
			$vlistas[$vi] = $value;
			$vi++;
		}
	}
	
	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_email) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  E-mail#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(EmktContatoManage::alterarEmktContato($ID, null, $frm_nome, $frm_email, $frm_status)){
				
				$vg = EmktContatoListaManage::consultarEmktContatoListaAttribute(EmktContatoListaAttribute::IdEmktContato(), $obj->getIdEmktContato());
				for($i=0; $i < count($vg); $i++){
					EmktContatoListaManage::excluirEmktContatoLista($vg[$i]["id_emkt_contato_lista"]);
				}				
				
				for($i=0; $i < count($vlistas); $i++){
					EmktContatoListaManage::inserirEmktContatoLista(-1, null, $obj->getIdEmktContato(), $vlistas[$i]);
				}
				
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteração não Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_status = $obj->getStatus();
		
		$vlistas = array();
		$vg = EmktContatoListaManage::consultarEmktContatoListaAttribute(EmktContatoListaAttribute::IdEmktContato(), $obj->getIdEmktContato());
		for($i=0; $i < count($vg); $i++){
			$vlistas[$i] = $vg[$i]["id_emkt_lista"];
		}
	}
?>
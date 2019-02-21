<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_etapa_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_etapa_add.php?back=$link_back";
	$link_edit = "lojista_etapa_edit.php?id=$ID&back=$link_back";
	$link_remove = "lojista_etapa_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new LojistaEtapa();

	if( $obj->buscarLojistaEtapa(1, $ID) ){
		$ValueCronogramaEtapa = CronogramaEtapaManage::buscarCronogramaEtapa(1, $obj->getIdCronogramaEtapa());
		$frm_id_cronograma_etapa = $ValueCronogramaEtapa["titulo"];
		$ValueLojista = LojistaManage::buscarLojista(1, $obj->getIdLojista());
		$frm_id_lojista = $ValueLojista["nome"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$frm_data = System::FormatarData($obj->getData(), "d/m/y");
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>
<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "curriculo_acesso_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "curriculo_acesso_add.php?back=$link_back";
	$link_edit = "curriculo_acesso_edit.php?id=$ID&back=$link_back";
	$link_remove = "curriculo_acesso_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new CurriculoAcesso();

	if( $obj->buscarCurriculoAcesso(1, $ID) ){
		$ValueCurriculo = CurriculoManage::buscarCurriculo(1, $obj->getIdCurriculo());
		$frm_id_curriculo = $ValueCurriculo["nome"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_ip = $obj->getIp();
	}else{
		System::Redirect($link_list);
	}
?>
<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "foto_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "foto_add.php?back=$link_back";
	$link_edit = "foto_edit.php?id=$ID&back=$link_back";
	$link_remove = "foto_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Foto();

	if( $obj->buscarFoto(1, $ID) ){
		$ValueLojista = LojistaManage::buscarLojista(1, $obj->getIdLojista());
		$frm_id_lojista = $ValueLojista["nome"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$frm_titulo = $obj->getTitulo();
		$frm_imagem = $obj->getImagem();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>
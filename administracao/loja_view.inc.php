<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "loja_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "loja_add.php?back=$link_back";
	$link_edit = "loja_edit.php?id=$ID&back=$link_back";
	$link_remove = "loja_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Loja();

	if( $obj->buscarLoja(1, $ID) ){
		$ValueEmpreendimento = EmpreendimentoManage::buscarEmpreendimento(1, $obj->getIdEmpreendimento());
		$frm_id_empreendimento = $ValueEmpreendimento["titulo"];
		$ValueSegmento = SegmentoManage::buscarSegmento(1, $obj->getIdSegmento());
		$frm_id_segmento = $ValueSegmento["titulo"];
		$frm_numero = $obj->getNumero();
		$frm_pavimento = $obj->getPavimento();
		$frm_area = $obj->getArea();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>
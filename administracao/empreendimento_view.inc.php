<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "empreendimento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "empreendimento_add.php?back=$link_back";
	$link_edit = "empreendimento_edit.php?id=$ID&back=$link_back";
	$link_remove = "empreendimento_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Empreendimento();

	if( $obj->buscarEmpreendimento(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_endereco = $obj->getEndereco();
		$frm_telefone = $obj->getTelefone();
		$frm_email = $obj->getEmail();
		$frm_area_bruta_locavel = $obj->getAreaBrutaLocavel();
		$frm_area_total_construida = $obj->getAreaTotalConstruida();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>
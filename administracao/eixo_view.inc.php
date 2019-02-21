<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "eixo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "eixo_add.php?back=$link_back";
	$link_edit = "eixo_edit.php?id=$ID&back=$link_back";
	$link_remove = "eixo_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Eixo();

	if( $obj->buscarEixo(1, $ID) ){
		$frm_categoria = $obj->getCategoria();
		$frm_nome = $obj->getNome();
		$ValueDisciplina = DisciplinaManage::buscarDisciplina(1, $obj->getIdDisciplina());
		$frm_id_disciplina = $ValueDisciplina["nome"];
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>
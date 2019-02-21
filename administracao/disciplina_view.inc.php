<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "disciplina_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "disciplina_add.php?back=$link_back";
	$link_edit = "disciplina_edit.php?id=$ID&back=$link_back";
	$link_remove = "disciplina_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Disciplina();

	if( $obj->buscarDisciplina(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_semestre = $obj->getSemestre();
		$frm_conteudo = $obj->getConteudo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>
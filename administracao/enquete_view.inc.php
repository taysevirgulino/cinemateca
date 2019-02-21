<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "enquete_add.php";
	$link_edit = "enquete_edit.php?id=$ID";
	$link_remove = "enquete_remove.php?id=$ID";
	$link_list = "enquete_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Enquete();

	if( $obj->buscarEnquete(1, $ID) ){
		$frm_pergunta = System::_TextByHtml($obj->getPergunta());
		$frm_data_inicial = System::FormatarData($obj->getDataInicial(), "d/m/y");
		$frm_data_final = System::FormatarData($obj->getDataFinal(), "d/m/y");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
		
		$Alternativas = EnqueteAlternativaManage::consultarEnqueteAlternativaAttribute(EnqueteAlternativaAttribute::IdEnquete(), $ID, SearchComparer::Igual(), EnqueteAlternativaAttribute::Prioridade(), SearchOrder::Crescente());
		
	}else{
		System::Redirect($link_list);
	}
?>
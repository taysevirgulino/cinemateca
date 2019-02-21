<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "conteudo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "conteudo_add.php?back=$link_back";
	$link_edit = "conteudo_edit.php?id=$ID&back=$link_back";
	$link_remove = "conteudo_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Conteudo();

	if( $obj->buscarConteudo(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_codigo = $obj->getCodigo();
		$frm_legenda = $obj->getLegenda();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_imagem = $obj->getImagem();
		$frm_prioridade = $obj->getPrioridade();
	}else{
		System::Redirect($link_list);
	}
?>
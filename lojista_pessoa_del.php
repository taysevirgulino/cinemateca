<?
	require_once("config.inc.php");

	Validar::Completo();
	
	$obj = new LojistaPessoa();
	if( !$obj->buscarAttribute(LojistaPessoaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	$obj->setStatus( 0 );
	
	if( $obj->alterar() ){
	    UsuarioManage2::LojistaPessoa($obj, "", "", false);
	    
	    System::Redirect(
	       Url::_Path()."lojista-pessoa-list?msg-success=".base64_encode("Contato excluído com sucesso.")
	    );
	}else{
	    System::Redirect(
	       Url::_Path()."lojista-pessoa-list?msg-danger=".base64_encode("Problema ao excluir, tente novamente daqui alguns minutos")
	    );
	}
?>
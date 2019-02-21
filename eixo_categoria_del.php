<?
	require_once("config.inc.php");

	// Validar::Completo();
	
	$obj = new EixoCategoria();
	if( !$obj->buscarAttribute(EixoCategoriaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	$obj->setStatus( 0 );
	
	if( $obj->alterar() ){
	    System::Redirect(
	       Url::_Path()."eixo-categoria-list?msg-success=".base64_encode("Categoria do Eixo excluída com sucesso.")
	    );
	}else{
	    System::Redirect(
	       Url::_Path()."eixo-categoria-list?msg-danger=".base64_encode("Problema ao excluir, tente novamente daqui alguns minutos")
	    );
	}
?>
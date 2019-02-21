<?
	require_once("config.inc.php");

	$obj = new Eixo();
	if( !$obj->buscarAttribute(EixoAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	$obj->setStatus( 0 );
	
	if( $obj->alterar() ){
	    System::Redirect(
	       Url::_Path()."eixo-list?msg-success=".base64_encode("Eixo excluído com sucesso.")
	    );
	}else{
	    System::Redirect(
	       Url::_Path()."eixo-list?msg-danger=".base64_encode("Problema ao excluir, tente novamente daqui alguns minutos")
	    );
	}
?>
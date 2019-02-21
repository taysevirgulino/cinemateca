<?
	require_once("config.inc.php");

	Validar::Completo();
	
	$obj = new Documento();
	if( !$obj->buscarAttribute(DocumentoAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	$obj->setStatus( 0 );
	
	if( $obj->alterar() ){
	    System::Redirect(
	       Url::_Path()."documento-list?msg-success=".base64_encode("Documento excluído com sucesso.")
	    );
	}else{
	    System::Redirect(
	       Url::_Path()."documento-list?msg-danger=".base64_encode("Problema ao excluir, tente novamente daqui alguns minutos")
	    );
	}
?>
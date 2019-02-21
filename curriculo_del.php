<?
	require_once("config.inc.php");

	Validar::Completo();
	
	$obj = new Curriculo();
	if( !$obj->buscarAttribute(CurriculoAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	$obj->setStatus( 0 );
	
	if( $obj->alterar() ){
	    System::Redirect(
	       Url::_Path()."curriculo-list?msg-success=".base64_encode("Currículo excluído com sucesso.")
	    );
	}else{
	    System::Redirect(
	       Url::_Path()."curriculo-list?msg-danger=".base64_encode("Problema ao excluir, tente novamente daqui alguns minutos")
	    );
	}
?>
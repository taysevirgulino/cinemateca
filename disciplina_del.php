<?
	require_once("config.inc.php");

	// Validar::Completo();
	
	$obj = new Disciplina();
	if( !$obj->buscarAttribute(DisciplinaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	$obj->setStatus( 0 );
	
	if( $obj->alterar() ){
	    System::Redirect(
	       Url::_Path()."disciplina-list?msg-success=".base64_encode("Disciplina excluída com sucesso.")
	    );
	}else{
	    System::Redirect(
	       Url::_Path()."disciplina-list?msg-danger=".base64_encode("Problema ao excluir, tente novamente daqui alguns minutos")
	    );
	}
?>
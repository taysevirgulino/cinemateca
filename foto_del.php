<?
	require_once("config.inc.php");

	Validar::Completo();
	
	$obj = new Foto();
	if( !$obj->buscarAttribute(FotoAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	$objLojista = new Lojista();
	if( !$objLojista->buscarAttribute(LojistaAttribute::IdLojista(), $obj->getIdLojista()) ){
	    System::Redirect( Url::Lojista_Selecionar("foto-list") );
	}
	
	$obj->setStatus( 0 );
	
	if( $obj->alterar() ){
	    System::Redirect(
	       Url::_Path()."foto-list-".$objLojista->getIdentificador()."?msg-success=".base64_encode("Fotografia excluída com sucesso.")
	    );
	}else{
	    System::Redirect(
	       Url::_Path()."foto-list-".$objLojista->getIdentificador()."?msg-danger=".base64_encode("Problema ao excluir, tente novamente daqui alguns minutos")
	    );
	}
?>
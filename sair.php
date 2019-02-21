<?
	require_once("config.inc.php");
	
	UsuarioLogin::Sair();
	System::Redirect( Url::Entrar() );

?>
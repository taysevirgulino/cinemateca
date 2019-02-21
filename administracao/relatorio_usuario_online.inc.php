<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	
	@include_once("acessoonline.inc.php");
	
	$valor = AcessoOnlineManage::Online();
?>
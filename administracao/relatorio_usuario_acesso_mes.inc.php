<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	
	$ano = intval($_REQUEST["ano"]);
	if(empty($ano)){ $ano = date("Y"); }
	
	$vobj = AcessoLiveManage::Relatorio_Acesso_Mes($ano);

?>
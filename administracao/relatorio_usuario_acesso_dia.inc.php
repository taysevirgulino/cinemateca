<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	
	$data = $_REQUEST["mes"];
	if(empty($data)){ System::Redirect("relatorio_usuario_acesso_ano.php"); }
	$adata = explode("/", $data);
	$ano = $adata[0];
	if(empty($ano)){ $ano = date("Y"); }
	$mes = $adata[1];
	if(empty($mes)){ $mes = date("m"); }
	
	$vobj = AcessoLiveManage::Relatorio_Acesso_Dia($ano, $mes);

?>
<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	
	$data = $_REQUEST["dia"];
	if(empty($data)){ System::Redirect("relatorio_usuario_acesso_ano.php"); }
	$adata = explode("/", $data);
	$ano = $adata[0];
	if(empty($ano)){ $ano = date("Y"); }
	$mes = $adata[1];
	if(empty($mes)){ $mes = date("m"); }
	$dia = $adata[2];
	if(empty($dia)){ $dia = date("d"); }
	
	$vobj = AcessoLiveManage::Relatorio_Acesso_Hora($ano, $mes, $dia);
	
?>
<?
	require_once("config.inc.php");
	
	$q = System::_REQUEST("q");
	if (empty($q)) return;
	
	$Objs = NoticiaManage2::Autocomplete($q);
	
	for ($i=0; $i < count($Objs); $i++){
		echo ($Objs[$i]["titulo"]." (".System::FormatarData($Objs[$i]["datahora"], "d/m/y Hhi").") [#".$Objs[$i]["id_noticia"])."]\n";
	}
?>
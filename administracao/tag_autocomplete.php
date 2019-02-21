<?
	require_once("config.inc.php");
	
	$q = System::_REQUEST("q");
	if (empty($q)) return;
	
	$Tags = TagManage2::Autocomplete($q);
	
	for ($i=0; $i < count($Tags); $i++){
		echo ($Tags[$i]["nome"]."|".$Tags[$i]["id_tag"])."\n";
	}
?>
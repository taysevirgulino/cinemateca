<?
	require_once("config.inc.php");
	//require_once("logon.inc.php");
	
	//$pathFile = $_SERVER['DOCUMENT_ROOT']."/files/multimidia/";
	$pathFile = "../files/multimidia/";
	$error = 0;
	
	foreach($_FILES as $tagname=>$frm_file) {
	
		$frm_file_name = "";
		if( !empty($frm_file["name"])  ){
			$upload = new Upload();
			$prename = date("Y_m_d")."_";
			if($upload->SendFile($frm_file, $pathFile.$prename, 3)){
				$frm_file_name = $prename.$upload->getName();
			}else{
				$error++;
			}
		}
	}
	
	if($error > 0){
		print "failure";
	}else{
		print "success";
	}
?>
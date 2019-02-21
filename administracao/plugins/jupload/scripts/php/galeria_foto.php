<?php
/**
 * JUpload-Post Handler
 * 
 * These scripts are not for re-distribution and for use with JUpload only.
 * 
 * If you want to use these scripts outside of its JUpload-related context,
 * please write a mail and check back with us @ info@jupload.biz
 * 
 * @author Dominik Seifert, dominik.seifert@smartwerkz.com
 * @copyright Smartwerkz, Haller Systemservices: www.jupload.biz
 */

global $_ju_listener, $_ju_uploadRoot, $_ju_fileDir, $_ju_thumbDir, $_ju_maxSize;

// Include a file which provides several helper functions and is configured through the jupload.cfg.php
include_once(dirname(__FILE__) . "/inc/jupload.inc.php");

// Upload is starting
$_ju_listener->onStart($_SERVER["HTTP_X_JUPLOAD_ID"]);

/*ARTEMSITE*/

function __autoload($classname){ require_once($_SERVER['DOCUMENT_ROOT']."/administracao/class/".$classname.".class.php"); }

$pathImages = $_SERVER['DOCUMENT_ROOT']."/images/galeria/";
$frm_id_galeria_album = intval($_REQUEST["ida"]);

foreach($_FILES as $tagname=>$frm_foto_file) {

	$frm_foto = "";
	if( !empty($frm_foto_file["name"])  ){
		$upload = new Upload();
		$prename = date("YmdHis")."_";
		if($upload->SendFile($frm_foto_file, $pathImages.$prename, 2)){
			$frm_foto = $prename.$upload->getName();
			$i = new Imagem();
			$i->carregarImagem($pathImages.$frm_foto);
			
			/*$i->salvarImagemByCorte(50, 50, $pathImages."A$frm_foto");
			$i->salvarImagemByCorte(200, 140, $pathImages."B$frm_foto");
			$i->salvarImagemByCorte(426, 273, $pathImages."C$frm_foto");
			if($i->getImagemWidth() > 640){
				$i->salvarImagemByPorcentagem(640, $pathImages."$frm_foto");
			}*/
			////
			$i->salvarImagemByPorcentagem(640, $pathImages."A$frm_foto");
			$i->salvarImagemByCorte(80, 80, $pathImages."B$frm_foto");
			$i->salvarImagemByCorte(130, 90, $pathImages."C$frm_foto");
			if($i->getImagemWidth() > 640){
				$i->salvarImagemByPorcentagem(640, $pathImages."$frm_foto");
			}
		}
	}	
	
	if(!empty($frm_foto)){
		GaleriaFotoManage::inserirGaleriaFoto(-1, null, null, $frm_id_galeria_album, "", "", $frm_foto, GaleriaFotoManage::ultimaPrioridade());
	}
	
	$isThumbs = $_POST[$tagname . '_thumbnail'];
	$_ju_listener->onReceived($pathImages, $frm_foto, $isThumbs);
	
}


$_ju_listener->finished();
?>
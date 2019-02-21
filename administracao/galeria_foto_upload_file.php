<?
	require_once("config.inc.php");
	//require_once("logon.inc.php");
	
	$frm_id_galeria_album = intval($_REQUEST["ida"]);
	$frm_credito = base64_decode(System::_GET("credito"));
	$frm_descricao = base64_decode(System::_GET("descricao"));
	$error = 0;
	
	foreach($_FILES as $tagname=>$frm_foto_file) {
	
		$frm_foto = "";
		if( !empty($frm_foto_file["name"])  ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_foto_file, "../images/galeria/$prename", 2)){
				$frm_foto = $prename.$upload->getName();
				$i = new Imagem();
				$i->carregarImagem("../images/galeria/$frm_foto");
				
				$i->salvarImagemByPorcentagemWidth(640, "../images/galeria/A$frm_foto");
				$i->salvarImagemByCorte(160, 160, "../images/galeria/B$frm_foto");
				if( ($i->getImagemWidth() > 700) ){
					$i->salvarImagemByPorcentagemWidth(700, "../images/galeria/$frm_foto");
				}
				
			}else{
				$error++;
			}
		}	
		
		if(!empty($frm_foto)){
			if(!GaleriaFotoManage::inserirGaleriaFoto(-1, null, null, $frm_id_galeria_album, $frm_credito, $frm_descricao, $frm_foto, GaleriaFotoManage::ultimaPrioridade())){
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
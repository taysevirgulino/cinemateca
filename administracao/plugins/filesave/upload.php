<?php
	function __autoload($classname){
		$file =  "../../class/".$classname.".class.php";
		if(file_exists($file)){ require_once($file); }
	}
	
	$_module = $_REQUEST["data"];
	
	$frm_arquivo_file = $_FILES["file"];
	
	$frm_arquivo = "";
	if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
		
		$fileTypes = array('jpg','jpeg','gif','png','avi','mp4','wmv','mp3','wma','doc','docx','pdf');
		$fileParts = pathinfo($frm_arquivo_file['name']);
		if (!in_array(strtolower($fileParts['extension']),$fileTypes)) {
			print sprintf("0;%s", "Extensao de arquivo invalido");
			exit();
		}
		
		$path = "../../../files/$_module";
		
		$upload = new Upload();
		$prename = date("YmdHis")."_";
		if($upload->SendFile($frm_arquivo_file, "$path/$prename", 3)){
			$frm_arquivo = $prename.$upload->getName();
			
			print sprintf("1;%s", $frm_arquivo);
		}else{
			print sprintf("0;%s", "Problema ao enviar arquivo. Verifique seu tipo ou tamanho.");
		}
		
	}else{
		print sprintf("0;%s", "Arquivo nao foi selecionado");
	}
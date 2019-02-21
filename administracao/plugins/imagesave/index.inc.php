<?php
	require_once 'wideimage/WideImage.php';
	function __autoload($classname){
		$file =  "../../class/".$classname.".class.php";
		if(file_exists($file)){ require_once($file); }
	}
	
	$_module = $_GET["module"];
	$_width = $_GET["width"];
	$_height = $_GET["height"];
	$_prename = $_GET["prename"];
	$_name = $_GET["name"];
	$_input = $_GET["input"];
	$error = '';
	$_url = sprintf("%s?module=%s&width=%s&height=%s&prename=%s&name=%s&input=%s", $_SERVER['PHP_SELF'], $_module, $_width, $_height, $_prename, $_name, $_input);
	
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	
	$frm_imagem = "";
	if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
		$upload = new Upload();
		$path = "../../../images/$_module";
		
		$aux = strtolower($frm_imagem_file["name"]);
		preg_match('/\.([a-z]){3,4}$/', $aux, $matches);
		$ext = preg_replace("/[^a-z]/", '', $matches[0]);
		$file = "$_prename$_name.$ext";
		
		if( move_uploaded_file($frm_imagem_file["tmp_name"], "$path/$file") ){
			$frm_imagem = $file;
			
			$img = WideImage::loadFromFile( "$path/$frm_imagem" );
			
			$resized = $img->resize($_width, $_height);
			$resized->saveToFile( "$path/$frm_imagem" );
			
		}else{
			$error .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.";
		}
	}
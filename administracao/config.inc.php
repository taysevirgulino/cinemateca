<?php 
	setlocale(LC_TIME,"pt_BR","pt_BR.ISO-8859-1","pt_BR.utf-8");
	date_default_timezone_set("America/Fortaleza");
	header('Content-type: text/html; charset=iso-8859-1');
	
	// Inicializando Servi�os ------------------------------------------------------|
	session_start();
	function __autoload($classname){
		$file =  "class/".$classname.".class.php";
		if(file_exists($file)){ require_once($file); }
	}
	db::_Start();
	// -----------------------------------------------------------------------------|
	
	// Vari�veis de Ambiente -------------------------------------------------------|
	
	$USER_GRUPO_VISITANTE = 1;
	
	// -----------------------------------------------------------------------------|
?>
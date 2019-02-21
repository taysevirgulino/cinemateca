<?php
	setlocale(LC_TIME,"pt_BR","pt_BR.ISO-8859-1","pt_BR.utf-8");
	date_default_timezone_set("America/Fortaleza");
	header('Content-type: text/html; charset=iso-8859-1');

	session_start();
	
	function __autoload($classname){
		//$path = $_SERVER["CONTEXT_DOCUMENT_ROOT"];
		$path = "";
		$file =  $path."administracao/class/".$classname.".class.php";
		if(file_exists($file)){ require_once($file); }
		$file =  SMARTY_SYSPLUGINS_DIR.strtolower($classname).".php";
		if(file_exists($file)){ require_once($file); }
	}
	
	AcessoOnlineManage::Atualizar(session_id());
	if(empty($_SESSION["SESSAO_ACESSO"])){
	    AcessoLiveManage::Acessar();
	    $_SESSION["SESSAO_ACESSO"] = "OK";
	}
?>
<?php
	function __autoload($classname){
		$file =  "../../class/".$classname.".class.php";
		if(file_exists($file)){ require_once($file); }
	}
	
	$_module = $_GET["module"];
	$_input = $_GET["input"];
	$error = '';
	$_url = sprintf("%s?module=%s&input=%s", $_SERVER['PHP_SELF'], $_module, $_input);

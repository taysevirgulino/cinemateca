<?php
	require_once("config.inc.php");
	
	Validar::Completo();
	
	$objUsuario = UsuarioLogin::getUsuario();
	
	switch ($objUsuario->getIdUsuarioPerfil()) {
	    // case 1: { 
	    //     require_once "index_perfil_1.php";
	    //     exit();
	    // }break;
	    default: {
	        require_once "index_perfil_2.php";
	        exit();
	    }break;
	}
?>
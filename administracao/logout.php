<?
	require_once("config.inc.php");
	session_destroy();
	System::Redirect("index.php");
?>
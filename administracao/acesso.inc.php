<?
	if(empty($_SESSION["SESSAO_ACESSO"])){
		AcessoLiveManage::Acessar();
		$_SESSION["SESSAO_ACESSO"] = "OK";
	}
?>
<?
	if(!$USER_STATUS){
		System::Redirect("login.php");
		exit();
	}
	
	$bloco = array();
	
	$bloco[] = array("Usuários Online:", "<span class='azul'>".AcessoOnlineManage::Online()."</span>");
	$bloco[] = array("Acessos:", "<span class='azul'>".AcessoLiveManage::QuantidadeAcessosHoje()."</span>");
	
	/*
	$bloco[] = array("", "");
	$bloco[] = array("&raquo; FALE CONOSCOS", "");
	
	$qtd_fale = FaleConoscoManage::QuantidadeHoje();
	$qtd_fale0 = FaleConoscoManage::QuantidadeStatus(0);
	$qtd_fale1 = FaleConoscoManage::QuantidadeStatus(1);
	$bloco[] = array("Hoje:", "<span class='".(($qtd_fale>0) ? "vermelho negrito" : "verde")."'>".$qtd_fale."</span>");
	$bloco[] = array("Não lidos:", "<span class='".(($qtd_fale0>0) ? "vermelho negrito" : "verde")."'>".$qtd_fale0."</span>");
	$bloco[] = array("Lidos:", "<span class='".(($qtd_fale1>0) ? "vermelho negrito" : "verde")."'>".$qtd_fale1."</span>");
	*/
?>
<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = "emkt_disparo.php?id=$ID";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Emkt();

	if( $obj->buscarEmkt(1, $ID) ){
		
		$frm_email = System::_POST("FrmEmailTeste");
		
		if(EmktEmail::EnviarTeste($obj->getIdEmkt(), $frm_email)){
			System::AlertRedirect("- E-mail teste enviado com Suceso;\\n- Verifique a caixa de entrada do e-mail informado;", $link_list);	
		}else{
			System::AlertRedirect("- E-mail teste NÃO enviado;\\n- Teste novamente daqui alguns minutos;", $link_list);
		}
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>
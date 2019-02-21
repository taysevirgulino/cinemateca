<?
	$ID = intval($_REQUEST["id"]);
	if(empty($ID)){ System::Redirect("banner_list.php");}
	
	$frm_di = $_REQUEST["di"];
	$frm_df = $_REQUEST["df"];
	$frm_bt = $_REQUEST["btSubmit"];
	
	$obj = BannerManage::buscarBanner(1, $ID);
	if(empty($obj)){ System::Redirect("banner_list.php");}
	
	$ERRO = "";
	
	$sql = "SELECT 
			  DATE(tb_banner_acesso.datahora) AS data,
			  SUM(tb_banner_acesso.click) AS clicks
			FROM
			  tb_banner_acesso
			WHERE
			  id_banner = $ID
			GROUP BY
			      data
			ORDER BY
			      data DESC";	
	
	if(!empty($frm_bt))
	{
		$di = explode("/", $frm_di);
		if( ! checkdate($di[1], $di[0], $di[2])){
			$ERRO = "Formato da data inicial é inválida. Formato aceito: DD/MM/YYYY<br />";		
		}
		
		$df = explode("/", $frm_df);
		if( ! checkdate($df[1], $df[0], $df[2])){
			$ERRO = "Formato da data final é inválida. Formato aceito: DD/MM/YYYY<br />";		
		}
		
		if($ERRO == ""){
				$sql = "SELECT 
						  DATE(tb_banner_acesso.datahora) AS data,
						  SUM(tb_banner_acesso.click) AS clicks
						FROM
						  tb_banner_acesso
						WHERE
						  id_banner = $ID AND
						  (tb_banner_acesso.datahora BETWEEN '".($di[2].'-'.$di[1].'-'.$di[0])."' AND '".($df[2].'-'.$df[1].'-'.$df[0])."')
						GROUP BY
						      data
						ORDER BY
						      data DESC";
		}
	
	}
	
	$dbq = new dbQuery();
	
	$dbq->consultar($sql);
	
	$vobj = array();
	$i=0;
	$QTD_TOTAL = 0;
	while( $dbq->registro() ){ 
	
		$vobj[$i]["data"] = System::FormatarData($dbq->valor("data"), "d/m/Y");
		$vobj[$i]["clicks"] = intval($dbq->valor("clicks"));
		
		$QTD_TOTAL += $vobj[$i]["clicks"];
		
		$i++;
	}
	
	$frm_di = (($frm_di==null) ? $vobj[$i-1]["data"] : $frm_di);
	$frm_df = (($frm_df==null) ? $vobj[0]["data"] : $frm_df);
?>
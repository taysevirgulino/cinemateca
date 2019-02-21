<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	
	$sql = "SELECT
			  DATE_FORMAT(`tb_acesso_live`.datahora,'%Y-%m-%d') AS data,
			  SUM(`tb_acesso_live`.acesso) AS qtd
			FROM
			  `tb_acesso_live`
			GROUP BY
			   data
			ORDER BY data DESC";
	
	$dbq = new dbQuery();	
	$dbq->consultar($sql);
	
	$vobj = array();
	$i=0;
	$qtd=0;
	while( $dbq->registro() ){
		$vobj[$i][0] = System::FormatarData($dbq->valor("data"), "d/m/Y");
		$vobj[$i++][1] = $dbq->valor("qtd");
		$qtd += intval($dbq->valor("qtd"));
	}
	
	for($i=0; $i < count($vobj); $i++){
		$vobj[$i][2] = number_format(((100*$vobj[$i][1])/$qtd), 2, ",", ".");
	}

?>
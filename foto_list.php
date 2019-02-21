<?
	require_once("config.inc.php");
	
	Validar::Completo();
	$objUsuario = UsuarioLogin::getUsuario();
	
	
	$objLojista = new Lojista();
	if( !$objLojista->buscarAttribute(LojistaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Lojista_Selecionar("foto-list") );
	}


	
	$template = new LayoutTemplate();
	$fileTemplate = "foto_list.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){

		/*
		 * DEFAULT
		 */
	    $Titulo = "Relatório Fotográfico: ".$objLojista->getNome();
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Lojistas", Url::_Path()."lojista-list");
		$Navegacao->Adicionar("Relatório Fotográfico");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("objLojista", $objLojista);
		
		
		$sql = "SELECT DISTINCT 
                  tb_foto.*
                FROM
                  tb_foto
                WHERE
                  (tb_foto.id_lojista = :id_lojista) AND (tb_foto.status = 1)
                ORDER BY
                  tb_foto.datahora DESC";
                		
		$adapter = Config::getAdapterService("Lojista");
		$prepare = $adapter->getConnection()->prepare($sql);
		$result = $prepare->execute( array(
		    ':id_lojista' => $objLojista->getIdLojista(),
		) );
		
		$itens = $prepare->fetchAll(PDO::FETCH_ASSOC);

		$template->assign("Itens", $itens);
			$template->assign("Val", $objUsuario);

			
	}
	$template->display($fileTemplate);

?>
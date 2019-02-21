<?
	require_once("config.inc.php");

	Validar::Completo();
	
	$obj = new Mensagem();
	if( !$obj->buscarAttribute(MensagemAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	MensagemManage2::Acessar($obj);
	
	$template = new LayoutTemplate();
	$fileTemplate = "mensagem_view.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Mensagem #".$obj->getIdMensagem();
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Mensagens", Url::_Path()."mensagem-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("obj", $obj);
		$template->assign("status", MensagemManage2::Status($obj->getIdMensagem(), UsuarioLogin::IdUsuario()));
		
		$objUsuario = new Usuario();
		$objUsuario->buscarAttribute(UsuarioAttribute::IdUsuario(), $obj->getIdUsuarioRemetente());
		$template->assign("objUsuarioRemetente", $objUsuario);
		
		$objUsuario = new Usuario();
		$objUsuario->buscarAttribute(UsuarioAttribute::IdUsuario(), $obj->getIdUsuarioDestinatario());
		$template->assign("objUsuarioDestinatario", $objUsuario);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
		$sql = "SELECT 
                  tb_usuario.id_usuario,
                  tb_usuario.nome,
                  tb_usuario.email,
                  tb_usuario.imagem,
                  tb_mensagem_resposta.id_mensagem_resposta,
                  tb_mensagem_resposta.identificador,
                  tb_mensagem_resposta.texto,
                  tb_mensagem_resposta.arquivo,
                  tb_mensagem_resposta.datahora,
                  tb_mensagem_resposta.ip
                FROM
                  tb_mensagem_resposta
                  INNER JOIN tb_usuario ON (tb_mensagem_resposta.id_usuario = tb_usuario.id_usuario)
                WHERE
                  tb_mensagem_resposta.id_mensagem = :id_mensagem
                ORDER BY
                  tb_mensagem_resposta.datahora DESC";
		
		$adapter = Config::getAdapterService("Mensagem");
		$prepare = $adapter->getConnection()->prepare($sql);
		$result = $prepare->execute( array(
		    ':id_mensagem' => $obj->getIdMensagem(),
		) );
		
		$itens = $prepare->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($itens as $i => $value) {
		    $itens[$i]["datahora"] = System::FormatarData($value['datahora'], 'd/m/Y Hhi');
		}
		
		$template->assign("itensMensagemHistorico", $itens);
	}
	$template->display($fileTemplate);

?>
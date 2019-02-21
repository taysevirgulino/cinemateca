<?
	require_once("config.inc.php");
	
	Validar::Completo();
	
	$template = new LayoutTemplate();
	$fileTemplate = "mensagem_list.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){


	    $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	    
		/*
		 * DEFAULT
		 */
	    $Titulo = "Mensagens";
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Mensagens");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		
		$sql = "SELECT 
                  tb_usuario.nome,
                  tb_usuario.email,
                  tb_usuario1.nome AS destinatario_nome,
                  tb_usuario1.email AS destinatario_email,
                  tb_mensagem.id_mensagem,
                  tb_mensagem.identificador,
                  tb_mensagem.titulo,
                  tb_mensagem.datahora_edicao AS datahora,
                  tb_mensagem.status
                FROM
                  tb_mensagem
                  INNER JOIN tb_usuario ON (tb_mensagem.id_usuario_remetente = tb_usuario.id_usuario)
                  INNER JOIN tb_usuario tb_usuario1 ON (tb_mensagem.id_usuario_destinatario = tb_usuario1.id_usuario)
                WHERE
                  (tb_mensagem.id_usuario_remetente = :id_usuario OR tb_mensagem.id_usuario_destinatario = :id_usuario)
                ORDER BY
                  tb_mensagem.datahora_edicao DESC";
                		
		$adapter = Config::getAdapterService("Lojista");
		$prepare = $adapter->getConnection()->prepare($sql);
		$result = $prepare->execute( array(
		    ':id_usuario' => UsuarioLogin::IdUsuario()
		) );
		
		$itens = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $idUsuario = UsuarioLogin::IdUsuario();
        
		foreach ($itens as $i => $value) {
		    $itens[$i]["status"] = MensagemManage2::Status($value["id_mensagem"], $idUsuario);
		    //$itens[$i]["status"] = MensagemStatus::_Descricao2( $value["status"] );
		    $itens[$i]["datahora"] = System::FormatarData($value['datahora'], 'd/m/Y Hhi');
		}

		$template->assign("Itens", $itens);
		
	}
	$template->display($fileTemplate);

?>
<?
	require_once("config.inc.php");

	Validar::Completo();

	$obj = new Arquivo();
	if( !$obj->buscarAttribute(ArquivoAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	$objLojista = new Lojista();
	if( !$objLojista->buscarAttribute(LojistaAttribute::IdLojista(), $obj->getIdLojista()) ){
	    System::Redirect( Url::Lojista_Selecionar("arquivo-list") );
	}


	$template = new LayoutTemplate();
	$fileTemplate = "arquivo_view.tpl.php";

	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Arquivo/Protocolo #".$obj->getIdArquivo();

		$template->setTitle($Titulo);
		$template->Load();

		/*
		 * PAGE
		 */

		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Lojistas", Url::_Path()."lojista-list" );
		$Navegacao->Adicionar( "Arquivos", Url::_Path()."arquivo-list-".$objLojista->getIdentificador() );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());

		$template->assign("Titulo", $Titulo);
		$objUser = UsuarioLogin::getUsuario();
		$template->assign("user", $objUser);



		$template->assign("obj", $obj);
		$template->assign("status", ArquivoStatus::_Descricao2($obj->getStatus()));
		$template->assign("objLojista", $objLojista);

		$objTipo = new ArquivoTipo();
		$objTipo->buscarAttribute(ArquivoTipoAttribute::IdArquivoTipo(), $obj->getIdArquivoTipo());
		$template->assign("objTipo", $objTipo);

		$objDisciplina = new ArquivoDisciplina();
		$objDisciplina->buscarAttribute(ArquivoDisciplinaAttribute::IdArquivoDisciplina(), $obj->getIdArquivoDisciplina());
		$template->assign("objDisciplina", $objDisciplina);

		$objUsuario = new Usuario();
		$objUsuario->buscarAttribute(UsuarioAttribute::IdUsuario(), $obj->getIdUsuario());
		$template->assign("objUsuario", $objUsuario);

		$objUsuario = new Usuario();
		$objUsuario->buscarAttribute(UsuarioAttribute::IdUsuario(), $obj->getIdUsuarioResponsavel());
		$template->assign("objUsuarioResponsavel", $objUsuario);

		$template->assign("error", $error);
		$template->assign("success", $success);

		$sql = "SELECT DISTINCT
                  tb_arquivo_tipo.titulo AS tipo_titulo,
                  tb_usuario.nome AS usuario_nome,
                  tb_usuario.imagem AS usuario_imagem,
                  tb_usuario1.nome AS usuario_responsavel_nome,
                  tb_usuario1.imagem AS usuario_responsavel_imagem,
                  tb_arquivo_historico.id_arquivo_historico,
                  tb_arquivo_historico.identificador,
                  tb_arquivo_historico.texto,
                  tb_arquivo_historico.datahora,
                  tb_arquivo_historico.`status`
                FROM
                  tb_arquivo_historico
                  INNER JOIN tb_arquivo_tipo ON (tb_arquivo_historico.id_arquivo_tipo = tb_arquivo_tipo.id_arquivo_tipo)
                  INNER JOIN tb_usuario ON (tb_arquivo_historico.id_usuario = tb_usuario.id_usuario)
                  INNER JOIN tb_usuario tb_usuario1 ON (tb_arquivo_historico.id_usuario_responsavel = tb_usuario1.id_usuario)
                WHERE
                  tb_arquivo_historico.id_arquivo = :id_arquivo
                ORDER BY
                  tb_arquivo_historico.datahora DESC";

		$adapter = Config::getAdapterService("Arquivo");
		$prepare = $adapter->getConnection()->prepare($sql);
		$result = $prepare->execute( array(
		    ':id_arquivo' => $obj->getIdArquivo(),
		) );

		$itens = $prepare->fetchAll(PDO::FETCH_ASSOC);

		foreach ($itens as $i => $value) {
		    $itens[$i]["status_label"] = ArquivoStatus::_Descricao2($value["status"]);

		    $data = System::FormatarData($value['datahora'], 'd/m/Y');
		    $hora = System::FormatarData($value['datahora'], 'H:i:s');
		    $data_short = (($data == date("d/m/Y")) ? System::FormatarData($value['datahora'], 'Hhi') : System::FormatarData($value['datahora'], 'd/m').' às '.System::FormatarData($value['datahora'], 'Hhi') );

		    $itens[$i]["datahora"] = $data_short;

		    $itensArquivoAnexo = ArquivoAnexoManage::consultarSearchQuery(
		        array(
		            new SearchQueryComparer(ArquivoAnexoAttribute::IdArquivoHistorico(), SearchComparer::Igual(), SearchCondition::E(), $value['id_arquivo_historico']),
		        ),
		        array(
		            new SearchQueryOrder(ArquivoAnexoAttribute::IdArquivoAnexo(), SearchOrder::Crescente())
		        )
		    );
		    $itens[$i]["anexos"] = $itensArquivoAnexo;
		}

		$template->assign("itensArquivoHistorico", $itens);
	}
	$template->display($fileTemplate);

?>
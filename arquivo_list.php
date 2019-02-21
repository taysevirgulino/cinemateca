<?
	require_once("config.inc.php");

	Validar::Completo();
	$objUsuario = UsuarioLogin::getUsuario();


	$objLojista = new Lojista();
	if( !$objLojista->buscarAttribute(LojistaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Lojista_Selecionar("arquivo-list") );
	}

	$template = new LayoutTemplate();
	$fileTemplate = "arquivo_list.tpl.php";

	if( !$template->isCached($fileTemplate) ){


	    $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();

		/*
		 * DEFAULT
		 */
	    $Titulo = "Arquivos Protocolados: ".$objLojista->getNome();
		$template->setTitle($Titulo);
		$template->Load();

		/*
		 * PAGE
		 */

		$template->assign("Titulo", $Titulo);

		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Lojistas", Url::_Path()."lojista-list");
		$Navegacao->Adicionar("Arquivos");
		$template->assign("Navegacao", $Navegacao->Gerar());

		$template->assign("objLojista", $objLojista);


		$sql = "SELECT DISTINCT
                  tb_arquivo_disciplina.titulo AS disciplina_titulo,
                  tb_arquivo_tipo.titulo AS tipo_titulo,
                  tb_arquivo.id_arquivo,
                  tb_arquivo.identificador,
                  tb_arquivo.id_usuario_responsavel,
                  tb_arquivo.titulo,
                  tb_arquivo.texto,
                  tb_arquivo.datahora_edicao AS datahora,
                  tb_arquivo.`status`
                FROM
                  tb_arquivo
                  INNER JOIN tb_arquivo_disciplina ON (tb_arquivo.id_arquivo_disciplina = tb_arquivo_disciplina.id_arquivo_disciplina)
                  INNER JOIN tb_arquivo_tipo ON (tb_arquivo.id_arquivo_tipo = tb_arquivo_tipo.id_arquivo_tipo)
                WHERE
                  tb_arquivo.id_lojista = :id_lojista
                ORDER BY
                  tb_arquivo.datahora_edicao DESC";

		$adapter = Config::getAdapterService("Lojista");
		$prepare = $adapter->getConnection()->prepare($sql);
		$result = $prepare->execute( array(
		    ':id_lojista' => $objLojista->getIdLojista(),
		) );

		$itens = $prepare->fetchAll(PDO::FETCH_ASSOC);

		foreach ($itens as $i => $value) {
		    $itens[$i]["status_label"] = ArquivoStatus::_Descricao2($value["status"]);

		    $data = System::FormatarData($value['datahora'], 'd/m/Y');
		    $hora = System::FormatarData($value['datahora'], 'H:i:s');
		    $data_short = (($data == date("d/m/Y")) ? System::FormatarData($value['datahora'], 'Hhi') : System::FormatarData($value['datahora'], 'd/m').' às '.System::FormatarData($value['datahora'], 'Hhi') );

		    $itens[$i]["datahora"] = $data_short;
		}

		$template->assign("Itens", $itens);
		$template->assign("user", $objUsuario);





	}
	$template->display($fileTemplate);

?>
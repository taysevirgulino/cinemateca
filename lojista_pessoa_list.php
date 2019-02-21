<?
	require_once("config.inc.php");
	
	Validar::Completo();
	$objUsuario = UsuarioLogin::getUsuario();
	$template = new LayoutTemplate();

	if( $objUsuario->getIdUsuarioPerfil() != 1){
		$fileTemplate = "lojista_pessoa_list.tpl.php";
	}else{
		 System::Redirect( Url::Painel() );
	}
	
	
	if( !$template->isCached($fileTemplate) ){


	    $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	    
		/*
		 * DEFAULT
		 */
	    $Titulo = "Contatos de Lojistas";
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Lojistas", Url::_Path()."lojista-list");
		$Navegacao->Adicionar("Contatos");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		
		$sql = "SELECT DISTINCT 
                  tb_lojista.nome AS lojista_nome,
                  tb_lojista_pessoa.identificador,
                  tb_lojista_pessoa.nome,
                  tb_lojista_pessoa.email,
                  tb_lojista_pessoa.telefone,
                  tb_lojista_pessoa_perfil.titulo AS perfil_titulo
                FROM
                  tb_lojista_pessoa
                  INNER JOIN tb_lojista_pessoa_perfil ON (tb_lojista_pessoa.id_lojista_pessoa_perfil = tb_lojista_pessoa_perfil.id_lojista_pessoa_perfil)
                  INNER JOIN tb_lojista ON (tb_lojista_pessoa.id_lojista = tb_lojista.id_lojista)
                  INNER JOIN tb_loja ON (tb_lojista.id_loja = tb_loja.id_loja)
                WHERE
                  tb_loja.id_empreendimento = :id_empreendimento AND tb_lojista_pessoa.status = :status
                ORDER BY
                  tb_lojista_pessoa.nome";
                		
		$adapter = Config::getAdapterService("Lojista");
		$prepare = $adapter->getConnection()->prepare($sql);
		$result = $prepare->execute( array(
		    ':id_empreendimento' => $objEmpreendimento->getIdEmpreendimento(),
		    ':status' => 1,
		) );
		
		$itens = $prepare->fetchAll(PDO::FETCH_ASSOC);

		/*foreach ($itens as $i => $value) {
		    //$itens[$i]["farol"] = LojistaManage2::Farol($value['id_lojista']);
		}*/

		$template->assign("Itens", $itens);
		
	}
	$template->display($fileTemplate);

?>
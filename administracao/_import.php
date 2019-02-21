<?php
	require_once("config.inc.php");
	
	//tb_editoria();
	//tb_noticia();
	//tb_jornal_edicao();
	//tb_jornal_estrutura();
	//tb_jornal_pagina();
	//tb_noticia_comentario();
	//tb_enquete();
	//tb_enquete_alternativa();
	//tb_enquete_resposta();
	//tb_acesso_live();
	//tb_galeria_album();
	//tb_galeria_categoria();
	//tb_galeria_foto();
	//tb_fale_conosco();
	//tb_fale_conosco_assunto();
	
	
	//tb_pagina();
	//tb_tempo_cidade();
	//tb_tempo_legenda();
	//tb_tag();
	//tb_tag_relacao();
	//tb_site();
	//tb_site_grupo();
	//tb_configuracao();
	
	function tb_noticia(){
		$sql = "SELECT 
				  tb_noticia.id_noticia,
				  tb_noticia.identificador,
				  tb_noticia.id_editoria,
				  tb_noticia.id_area_publicacao,
				  tb_noticia.chapeu,
				  tb_noticia.titulo,
				  tb_noticia.resumo,
				  tb_noticia.texto,
				  tb_noticia.foto_credito,
				  tb_noticia.foto_descricao,
				  tb_noticia.foto_arquivo,
				  tb_noticia.datahora,
				  tb_noticia.`status`
				FROM
				  tb_noticia
				ORDER BY
				  tb_noticia.id_noticia";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
		
		$areas = AreaPublicacaoManage::consultar();
		$ce = count($areas);
		$countE = -1;
		$count=0;
		while( $dbq->registro() ){
			
			if($countE >= ($ce-1)){
				$countE = 0;
			}else{
				$countE++;
			}
			
			$id_area_publicacao = intval($areas[$countE]["id_area_publicacao"]);
			$click = noticia_click($dbq->valor("id_noticia"));
			$comments = noticia_comments($dbq->valor("id_noticia"));
			$slug = NoticiaManage2::Slug($dbq->valor("id_noticia"), $dbq->valor("titulo"), $dbq->valor("id_editoria"));
			$url_curta = Url::_Host().Url::Noticia_Slug($dbq->valor("id_noticia"), $slug);
			
			$foto_credito = $dbq->valor("foto_credito");
			$foto_descricao = $dbq->valor("foto_descricao");
			$foto_arquivo = $dbq->valor("foto_arquivo");
			if( preg_match('/([[:space:]])+/', $foto_arquivo) ){
				$foto_credito = $foto_descricao = $foto_arquivo = "";
			}
			
			$chapeu = trim($dbq->valor("chapeu"));
			if( empty($chapeu) ){
				$objEditoria = new Editoria();
				$objEditoria->buscarAttribute(EditoriaAttribute::IdEditoria(), $dbq->valor("id_editoria"));
				$chapeu = $objEditoria->getNome();
			}
			
			$obj = new Noticia();
			$obj->setIdNoticia( $dbq->valor("id_noticia") );
			$obj->setIdentificador( $dbq->valor("identificador") );
			$obj->setIdeOrigem( Current::IdeOrigemDefault() );
			$obj->setIdEditoria( $dbq->valor("id_editoria") );
			$obj->setIdAreaPublicacao( $id_area_publicacao );
			$obj->setIdAppUsuarioCadastro( 18 );
			$obj->setIdAppUsuarioEdicao( 18 );
			$obj->setChapeu( $chapeu );
			$obj->setTitulo( $dbq->valor("titulo") );
			$obj->setResumo( $dbq->valor("resumo") );
			$obj->setTexto( $dbq->valor("texto") );
			$obj->setLink( '' );
			$obj->setLinkTarget( '' );
			$obj->setFotoCredito( $foto_credito );
			$obj->setFotoDescricao( $foto_descricao );
			$obj->setFotoArquivo( $foto_arquivo );
			$obj->setFotoAreaPublicacao( '' );
			$obj->setClick( $click );
			$obj->setShares( 0 );
			$obj->setComments( $comments );
			$obj->setSlug( $slug );
			$obj->setUrlCurta( $url_curta );
			$obj->setDatahora( $dbq->valor("datahora") );
			$obj->setDatahoraCadastro( $dbq->valor("datahora") );
			$obj->setDatahoraEdicao( $dbq->valor("datahora") );
			$obj->setTipo( 1 );
			$obj->setStatus( $dbq->valor("status") );
			
			$count++;
			
			print "$count = ".$dbq->valor("id_noticia").' - '.$obj->inserir()."\n";
		}
	}
	
	function noticia_click( $id_noticia ){
		$count = 0;
		
		$sql = "SELECT 
				  SUM(tb_noticia_acesso.click) AS `count`
				FROM
				  tb_noticia_acesso
				WHERE
				  tb_noticia_acesso.id_noticia = $id_noticia";
		
		$count = SearchMysqlQuery::CountBySql($sql);
		
		$sql = "SELECT 
				  SUM(tb_noticia_acesso_bk.click) AS `count`
				FROM
				  tb_noticia_acesso_bk
				WHERE
				  tb_noticia_acesso_bk.id_noticia = $id_noticia";
		
		$count += SearchMysqlQuery::CountBySql($sql);
		
		return $count;
	}
	
	function noticia_comments( $id_noticia ){
		$count = 0;
		
		$sql = "SELECT 
				  COUNT(tb_noticia_comentario.id_noticia_comentario) AS `count`
				FROM
				  tb_noticia_comentario
				WHERE
				  tb_noticia_comentario.id_noticia = $id_noticia";
		
		$count = SearchMysqlQuery::CountBySql($sql);
		
		return $count;
	}
	
	function tb_editoria(){
		$sql = "SELECT
				  tb_editoria.id_editoria,
				  tb_editoria.identificador,
				  tb_editoria.nome,
				  tb_editoria.blog,
				  tb_editoria.prioridade,
				  tb_editoria.`status`
				FROM
				  tb_editoria
				ORDER BY
				  tb_editoria.id_editoria";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$obj = new Editoria();
			$obj->setEditoria($dbq->valor("id_editoria"), $dbq->valor("identificador"), Current::IdeOrigemDefault(), 0, $dbq->valor("nome"), $dbq->valor("nome"), "", "", "", intval($dbq->valor("blog")), $dbq->valor("prioridade"), $dbq->valor("status"));
				
			print $dbq->valor("id_editoria").$obj->inserir()."\n";
		}
	}
	
	function tb_tempo_cidade(){
		$sql = "SELECT 
				  tb_tempo_cidade.id_tempo_cidade,
				  tb_tempo_cidade.identificador,
				  tb_tempo_cidade.nome,
				  tb_tempo_cidade.uf,
				  tb_tempo_cidade.codigo,
				  tb_tempo_cidade.prioridade,
				  tb_tempo_cidade.`status`
				FROM
				  tb_tempo_cidade
				ORDER BY
				  tb_tempo_cidade.prioridade";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$obj = new TempoCidade();
			
			$obj->setIdTempoCidade( $dbq->valor("id_tempo_cidade") );
			$obj->setIdentificador( $dbq->valor("identificador") );
			$obj->setNome( $dbq->valor("nome") );
			$obj->setUf( $dbq->valor("uf") );
			$obj->setCodigo( $dbq->valor("codigo") );
			$obj->setPrioridade( $dbq->valor("prioridade") );
			$obj->setStatus( $dbq->valor("status") );
				
			print $dbq->valor("id_tempo_cidade").$obj->inserir()."\n";
		}
	}
	
	function tb_tempo_legenda(){
		$sql = "SELECT 
				  tb_tempo_legenda.id_tempo_legenda,
				  tb_tempo_legenda.identificador,
				  tb_tempo_legenda.titulo,
				  tb_tempo_legenda.codigo
				FROM
				  tb_tempo_legenda
				ORDER BY
				  tb_tempo_legenda.id_tempo_legenda";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$obj = new TempoLegenda();
			$obj->setIdTempoLegenda( $dbq->valor("id_tempo_legenda") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setTitulo( $dbq->valor("titulo") ); 
			$obj->setCodigo( $dbq->valor("codigo") ); 
				
			print $dbq->valor("id_tempo_legenda").$obj->inserir()."\n";
		}
	}
	
	function tb_enquete(){
		$sql = "SELECT 
				  tb_enquete.id_enquete,
				  tb_enquete.identificador,
				  tb_enquete.ide_origem,
				  tb_enquete.pergunta,
				  tb_enquete.data_inicial,
				  tb_enquete.data_final,
				  tb_enquete.`status`
				FROM
				  tb_enquete
				ORDER BY
				  tb_enquete.id_enquete";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$obj = new Enquete();
			$obj->setIdEnquete( $dbq->valor("id_enquete") );
			$obj->setIdentificador( $dbq->valor("identificador") );
			$obj->setIdeOrigem( $dbq->valor("ide_origem") );
			$obj->setPergunta( $dbq->valor("pergunta") );
			$obj->setDataInicial( $dbq->valor("data_inicial") );
			$obj->setDataFinal( $dbq->valor("data_final") );
			$obj->setStatus( $dbq->valor("status") );
				
			print $dbq->valor("id_enquete").$obj->inserir()."\n";
		}
	}
	
	function tb_enquete_alternativa(){
		$sql = "SELECT 
				  tb_enquete_alternativa.id_enquete_alternativa,
				  tb_enquete_alternativa.identificador,
				  tb_enquete_alternativa.ide_origem,
				  tb_enquete_alternativa.id_enquete,
				  tb_enquete_alternativa.resposta,
				  tb_enquete_alternativa.prioridade
				FROM
				  tb_enquete_alternativa
				ORDER BY
				  tb_enquete_alternativa.id_enquete_alternativa";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = EnqueteAlternativaManage::inserir(array(
				"id_enquete_alternativa" => $dbq->valor("id_enquete_alternativa"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"id_enquete" => $dbq->valor("id_enquete"),
				"resposta" => $dbq->valor("resposta"),
				"prioridade" => $dbq->valor("prioridade"),
			));
				
			print $dbq->valor("id_enquete_alternativa").$rs."\n";
		}
	}
	
	function tb_enquete_resposta(){
		$sql = "SELECT 
				  tb_enquete_resposta.id_enquete_resposta,
				  tb_enquete_resposta.identificador,
				  tb_enquete_resposta.ide_origem,
				  tb_enquete_resposta.id_enquete_alternativa,
				  tb_enquete_resposta.ip,
				  tb_enquete_resposta.datahora
				FROM
				  tb_enquete_resposta
				ORDER BY
				  tb_enquete_resposta.id_enquete_resposta";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = EnqueteRespostaManage::inserir(array(
				"id_enquete_resposta" => $dbq->valor("id_enquete_resposta"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"id_enquete_alternativa" => $dbq->valor("id_enquete_alternativa"),
				"ip" => $dbq->valor("ip"),
				"datahora" => $dbq->valor("datahora"),
			));
				
			print $dbq->valor("id_enquete_resposta").$rs."\n";
		}
	}
	
	function tb_jornal_edicao(){
		$sql = "SELECT 
				  tb_jornal_edicao.id_jornal_edicao,
				  tb_jornal_edicao.identificador,
				  tb_jornal_edicao.numero,
				  tb_jornal_edicao.ano,
				  tb_jornal_edicao.data_inicial,
				  tb_jornal_edicao.data_final,
				  tb_jornal_edicao.`status`
				FROM
				  tb_jornal_edicao
				ORDER BY
				  tb_jornal_edicao.id_jornal_edicao";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = JornalEdicaoManage::inserir(array(
				"id_jornal_edicao" => $dbq->valor("id_jornal_edicao"),
				"identificador" => $dbq->valor("identificador"),
				"numero" => $dbq->valor("numero"),
				"ano" => $dbq->valor("ano"),
				"data_inicial" => $dbq->valor("data_inicial"),
				"data_final" => $dbq->valor("data_final"),
				"status" => $dbq->valor("status"),
			));
				
			print $dbq->valor("id_jornal_edicao").$rs."\n";
		}
	}
	
	function tb_jornal_estrutura(){
		$sql = "SELECT 
				  tb_jornal_estrutura.id_jornal_estrutura,
				  tb_jornal_estrutura.identificador,
				  tb_jornal_estrutura.nome,
				  tb_jornal_estrutura.prioridade
				FROM
				  tb_jornal_estrutura
				ORDER BY
				  tb_jornal_estrutura.id_jornal_estrutura";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = JornalEstruturaManage::inserir(array(
				"id_jornal_estrutura" => $dbq->valor("id_jornal_estrutura"),
				"identificador" => $dbq->valor("identificador"),
				"nome" => $dbq->valor("nome"),
				"prioridade" => $dbq->valor("prioridade"),
			));
				
			print $dbq->valor("id_jornal_estrutura").$rs."\n";
		}
	}
	
	function tb_jornal_pagina(){
		$sql = "SELECT 
				  tb_jornal_pagina.id_jornal_pagina,
				  tb_jornal_pagina.identificador,
				  tb_jornal_pagina.id_jornal_edicao,
				  tb_jornal_pagina.id_jornal_estrutura,
				  tb_jornal_pagina.imagem
				FROM
				  tb_jornal_pagina
				ORDER BY
				  tb_jornal_pagina.id_jornal_pagina";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = JornalPaginaManage::inserir(array(
				"id_jornal_pagina" => $dbq->valor("id_jornal_pagina"),
				"identificador" => $dbq->valor("identificador"),
				"id_jornal_edicao" => $dbq->valor("id_jornal_edicao"),
				"id_jornal_estrutura" => $dbq->valor("id_jornal_estrutura"),
				"imagem" => $dbq->valor("imagem"),
			));
				
			print $dbq->valor("id_jornal_pagina").$rs."\n";
		}
	}
	
	function tb_pagina(){
		$sql = "SELECT 
				  tb_pagina.id_pagina,
				  tb_pagina.identificador,
				  tb_pagina.ide_origem,
				  tb_pagina.id_pagina_pai,
				  tb_pagina.slug,
				  tb_pagina.titulo,
				  tb_pagina.resumo,
				  tb_pagina.texto,
				  tb_pagina.imagem,
				  tb_pagina.filhos_exibir,
				  tb_pagina.filhos_titulo,
				  tb_pagina.datahora,
				  tb_pagina.prioridade,
				  tb_pagina.`status`
				FROM
				  tb_pagina
				ORDER BY
				  tb_pagina.id_pagina";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = PaginaManage::inserir(array(
				"id_pagina" => $dbq->valor("id_pagina"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"id_pagina_pai" => $dbq->valor("id_pagina_pai"),
				"slug" => $dbq->valor("slug"),
				"titulo" => $dbq->valor("titulo"),
				"resumo" => $dbq->valor("resumo"),
				"texto" => $dbq->valor("texto"),
				"imagem" => $dbq->valor("imagem"),
				"filhos_exibir" => $dbq->valor("filhos_exibir"),
				"filhos_titulo" => $dbq->valor("filhos_titulo"),
				"datahora" => $dbq->valor("datahora"),
				"prioridade" => $dbq->valor("prioridade"),
				"status" => $dbq->valor("status"),
			));
				
			print $dbq->valor("id_pagina").$rs."\n";
		}
	}
	
	function tb_fale_conosco(){
		$sql = "SELECT 
				  tb_fale_conosco.id_fale_conosco,
				  tb_fale_conosco.identificador,
				  tb_fale_conosco.ide_origem,
				  tb_fale_conosco.id_fale_conosco_assunto,
				  tb_fale_conosco.nome,
				  tb_fale_conosco.email,
				  tb_fale_conosco.telefone,
				  tb_fale_conosco.cidade,
				  tb_fale_conosco.estado,
				  tb_fale_conosco.mensagem,
				  tb_fale_conosco.datahora,
				  tb_fale_conosco.`status`
				FROM
				  tb_fale_conosco
				ORDER BY
				  tb_fale_conosco.id_fale_conosco";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = FaleConoscoManage::inserir(array(
				"id_fale_conosco" => $dbq->valor("id_fale_conosco"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"id_fale_conosco_assunto" => $dbq->valor("id_fale_conosco_assunto"),
				"nome" => $dbq->valor("nome"),
				"email" => $dbq->valor("email"),
				"telefone" => $dbq->valor("telefone"),
				"cidade" => $dbq->valor("cidade"),
				"estado" => $dbq->valor("estado"),
				"mensagem" => $dbq->valor("mensagem"),
				"datahora" => $dbq->valor("datahora"),
				"status" => $dbq->valor("status"),
			));
				
			print $dbq->valor("id_fale_conosco").$rs."\n";
		}
	}
	
	function tb_fale_conosco_assunto(){
		$sql = "SELECT 
				  tb_fale_conosco_assunto.id_fale_conosco_assunto,
				  tb_fale_conosco_assunto.identificador,
				  tb_fale_conosco_assunto.ide_origem,
				  tb_fale_conosco_assunto.assunto,
				  tb_fale_conosco_assunto.prioridade
				FROM
				  tb_fale_conosco_assunto
				ORDER BY
				  tb_fale_conosco_assunto.id_fale_conosco_assunto";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = FaleConoscoAssuntoManage::inserir(array(
				"id_fale_conosco_assunto" => $dbq->valor("id_fale_conosco_assunto"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"assunto" => $dbq->valor("assunto"),
				"prioridade" => $dbq->valor("prioridade"),
			));
				
			print $dbq->valor("id_fale_conosco_assunto").$rs."\n";
		}
	}
	
	function tb_galeria_album(){
		$sql = "SELECT 
				  tb_galeria_album.id_galeria_album,
				  tb_galeria_album.identificador,
				  tb_galeria_album.ide_origem,
				  tb_galeria_album.id_galeria_categoria,
				  tb_galeria_album.nome,
				  tb_galeria_album.descricao,
				  tb_galeria_album.datahora,
				  tb_galeria_album.`status`
				FROM
				  tb_galeria_album
				ORDER BY
				  tb_galeria_album.id_galeria_album";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = GaleriaAlbumManage::inserir(array(
				"id_galeria_album" => $dbq->valor("id_galeria_album"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"id_galeria_categoria" => $dbq->valor("id_galeria_categoria"),
				"nome" => $dbq->valor("nome"),
				"descricao" => $dbq->valor("descricao"),
				"datahora" => $dbq->valor("datahora"),
				"status" => $dbq->valor("status"),
			));
				
			print $dbq->valor("id_galeria_album").$rs."\n";
		}
	}
	
	function tb_galeria_categoria(){
		$sql = "SELECT 
				  tb_galeria_categoria.id_galeria_categoria,
				  tb_galeria_categoria.identificador,
				  tb_galeria_categoria.ide_origem,
				  tb_galeria_categoria.nome,
				  tb_galeria_categoria.descricao,
				  tb_galeria_categoria.id_galeria_categoria AS prioridade
				FROM
				  tb_galeria_categoria
				ORDER BY
				  tb_galeria_categoria.id_galeria_categoria";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = GaleriaCategoriaManage::inserir(array(
				"id_galeria_categoria" => $dbq->valor("id_galeria_categoria"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"nome" => $dbq->valor("nome"),
				"descricao" => $dbq->valor("descricao"),
				"prioridade" => $dbq->valor("prioridade"),
			));
				
			print $dbq->valor("id_galeria_categoria").$rs."\n";
		}
	}
	
	function tb_galeria_foto(){
		$sql = "SELECT 
				  tb_galeria_foto.id_galeria_foto,
				  tb_galeria_foto.identificador,
				  tb_galeria_foto.ide_origem,
				  tb_galeria_foto.id_galeria_album,
				  tb_galeria_foto.credito,
				  tb_galeria_foto.descricao,
				  tb_galeria_foto.foto,
				  tb_galeria_foto.prioridade
				FROM
				  tb_galeria_foto
				ORDER BY
				  tb_galeria_foto.id_galeria_foto";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = GaleriaFotoManage::inserir(array(
				"id_galeria_foto" => $dbq->valor("id_galeria_foto"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"id_galeria_album" => $dbq->valor("id_galeria_album"),
				"credito" => $dbq->valor("credito"),
				"descricao" => $dbq->valor("descricao"),
				"foto" => $dbq->valor("foto"),
				"prioridade" => $dbq->valor("prioridade"),
			));
				
			print $dbq->valor("id_galeria_foto").$rs."\n";
		}
	}
	
	function tb_site(){
		$sql = "SELECT 
				  tb_site.id_site,
				  tb_site.identificador,
				  tb_site.titulo,
				  tb_site.email,
				  tb_site.email_nome,
				  tb_site.url,
				  tb_site.host,
				  tb_site.template,
				  tb_site.imagem_topo,
				  tb_site.`status`
				FROM
				  tb_site
				ORDER BY
				  tb_site.id_site";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = SiteManage::inserir(array(
				"id_site" => $dbq->valor("id_site"),
				"identificador" => $dbq->valor("identificador"),
				"titulo" => $dbq->valor("titulo"),
				"email" => $dbq->valor("email"),
				"email_nome" => $dbq->valor("email_nome"),
				"url" => $dbq->valor("url"),
				"host" => $dbq->valor("host"),
				"template" => $dbq->valor("template"),
				"imagem_topo" => $dbq->valor("imagem_topo"),
				"status" => $dbq->valor("status"),
			));
				
			print $dbq->valor("id_site").$rs."\n";
		}
	}
	
	function tb_site_grupo(){
		$sql = "SELECT 
				  tb_site_grupo.id_site_grupo,
				  tb_site_grupo.identificador,
				  tb_site_grupo.id_site,
				  tb_site_grupo.id_app_usuario_grupo
				FROM
				  tb_site_grupo
				ORDER BY
				  tb_site_grupo.id_site_grupo";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = SiteGrupoManage::inserir(array(
				"id_site_grupo" => $dbq->valor("id_site_grupo"),
				"identificador" => $dbq->valor("identificador"),
				"id_site" => $dbq->valor("id_site"),
				"id_app_usuario_grupo" => $dbq->valor("id_app_usuario_grupo"),
			));
				
			print $dbq->valor("id_site_grupo").$rs."\n";
		}
	}
	
	function tb_configuracao(){
		$sql = "SELECT 
				  tb_configuracao.id_configuracao,
				  tb_configuracao.identificador,
				  tb_configuracao.nome,
				  tb_configuracao.numero,
				  tb_configuracao.cargo,
				  tb_configuracao.estado,
				  tb_configuracao.slogan,
				  tb_configuracao.partido,
				  tb_configuracao.coligacao,
				  tb_configuracao.cnpj,
				  tb_configuracao.email,
				  tb_configuracao.telefone,
				  tb_configuracao.endereco_completo,
				  tb_configuracao.rodape,
				  tb_configuracao.twitter_status,
				  tb_configuracao.twitter_username,
				  tb_configuracao.twitter_password,
				  tb_configuracao.twitter_rss_url,
				  tb_configuracao.link_twitter,
				  tb_configuracao.link_orkut,
				  tb_configuracao.link_youtube,
				  tb_configuracao.link_facebook,
				  tb_configuracao.link_flickr,
				  tb_configuracao.analytics_key,
				  tb_configuracao.template_topo,
				  tb_configuracao.template_conteudo
				FROM
				  tb_configuracao";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = ConfiguracaoManage::inserir(array(
				"id_configuracao" => $dbq->valor("id_configuracao"),
				"identificador" => $dbq->valor("identificador"),
				"nome" => $dbq->valor("nome"),
				"numero" => $dbq->valor("numero"),
				"cargo" => $dbq->valor("cargo"),
				"estado" => $dbq->valor("estado"),
				"slogan" => $dbq->valor("slogan"),
				"partido" => $dbq->valor("partido"),
				"coligacao" => $dbq->valor("coligacao"),
				"cnpj" => $dbq->valor("cnpj"),
				"email" => $dbq->valor("email"),
				"telefone" => $dbq->valor("telefone"),
				"endereco_completo" => $dbq->valor("endereco_completo"),
				"rodape" => $dbq->valor("rodape"),
				"twitter_status" => $dbq->valor("twitter_status"),
				"twitter_username" => $dbq->valor("twitter_username"),
				"twitter_password" => $dbq->valor("twitter_password"),
				"twitter_rss_url" => $dbq->valor("twitter_rss_url"),
				"link_twitter" => $dbq->valor("link_twitter"),
				"link_orkut" => $dbq->valor("link_orkut"),
				"link_youtube" => $dbq->valor("link_youtube"),
				"link_facebook" => $dbq->valor("link_facebook"),
				"link_flickr" => $dbq->valor("link_flickr"),
				"analytics_key" => $dbq->valor("analytics_key"),
				"template_topo" => $dbq->valor("template_topo"),
				"template_conteudo" => $dbq->valor("template_conteudo"),
			));
				
			print $dbq->valor("id_configuracao").$rs."\n";
		}
	}
	
	function tb_acesso_live(){
		$sql = "SELECT 
				  tb_acesso_live.id_acesso_live,
				  tb_acesso_live.identificador,
				  tb_acesso_live.ide_origem,
				  tb_acesso_live.datahora,
				  tb_acesso_live.acesso
				FROM
				  tb_acesso_live
				ORDER BY
				  tb_acesso_live.id_acesso_live";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = AcessoLiveManage::inserir(array(
				"id_acesso_live" => $dbq->valor("id_acesso_live"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"datahora" => $dbq->valor("datahora"),
				"acesso" => $dbq->valor("acesso"),
			));
				
			print $dbq->valor("id_acesso_live").$rs."\n";
		}
	}
	
	function tb_noticia_comentario(){
		$sql = "SELECT 
				  tb_noticia_comentario.id_noticia_comentario,
				  tb_noticia_comentario.identificador,
				  tb_noticia_comentario.id_noticia,
				  tb_noticia_comentario.nome,
				  tb_noticia_comentario.email,
				  tb_noticia_comentario.texto,
				  tb_noticia_comentario.ip,
				  tb_noticia_comentario.datahora,
				  tb_noticia_comentario.`status`
				FROM
				  tb_noticia_comentario
				ORDER BY
				  tb_noticia_comentario.id_noticia_comentario";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = NoticiaComentarioManage::inserir(array(
				"id_noticia_comentario" => $dbq->valor("id_noticia_comentario"),
				"identificador" => $dbq->valor("identificador"),
				"ide_origem" => $dbq->valor("ide_origem"),
				"id_noticia" => $dbq->valor("id_noticia"),
				"nome" => $dbq->valor("nome"),
				"email" => $dbq->valor("email"),
				"texto" => $dbq->valor("texto"),
				"ip" => $dbq->valor("ip"),
				"datahora" => $dbq->valor("datahora"),
				"status" => $dbq->valor("status"),
			));
				
			print $dbq->valor("id_noticia_comentario").$rs."\n";
		}
	}
	
	function tb_tag(){
		$sql = "SELECT 
				  tb_tag.id_tag,
				  tb_tag.identificador,
				  tb_tag.nome,
				  tb_tag.slug,
				  tb_tag.quantidade
				FROM
				  tb_tag
				ORDER BY
				  tb_tag.id_tag";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = TagManage::inserir(array(
				"id_tag" => $dbq->valor("id_tag"),
				"identificador" => $dbq->valor("identificador"),
				"nome" => $dbq->valor("nome"),
				"slug" => $dbq->valor("slug"),
				"quantidade" => $dbq->valor("quantidade"),
			));
				
			print $dbq->valor("id_tag").$rs."\n";
		}
	}
	
	function tb_tag_relacao(){
		$sql = "SELECT 
				  tb_tag_relacao.id_tag_relacao,
				  tb_tag_relacao.identificador,
				  tb_tag_relacao.id_tag,
				  tb_tag_relacao.id_publicacao,
				  tb_tag_relacao.id_noticia
				FROM
				  tb_tag_relacao
				ORDER BY
				  tb_tag_relacao.id_tag_relacao";
	
		$dbq = new dbQuery();
		$dbq->consultar($sql);
			
		while( $dbq->registro() ){
				
			$rs = TagRelacaoManage::inserir(array(
				"id_tag_relacao" => $dbq->valor("id_tag_relacao"),
				"identificador" => $dbq->valor("identificador"),
				"id_tag" => $dbq->valor("id_tag"),
				"id_publicacao" => $dbq->valor("id_publicacao"),
				"id_noticia" => $dbq->valor("id_noticia"),
			));
				
			print $dbq->valor("id_tag_relacao").$rs."\n";
		}
	}
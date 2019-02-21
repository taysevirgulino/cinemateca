<?
	$frm["componente"] = intval( $_POST["sltComponente"] );
	$frm["permissao"] = intval( $_POST["sltPermissao"] );
	$frm["btsubmit"] = $_POST["btSubmit"];
	$ID_TIPO = intval( $_REQUEST["id"] );
	
	if( Validacao::isVazio($ID_TIPO) ){ 
		$ID_TIPO = 2;
		//System::Redirect("index.php"); 
	}
	
	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;
	
	// Carregando dados da Usuario Grupo -----------------------------------------|
	$pt = new AppUsuarioGrupo(); 
	$vpt = $pt->consultarAppUsuarioGrupo(2, "ORDER BY nome");
	// ---------------------------------------------------------------------------|

	// Carregando Componentes ----------------------------------------------------|
	$appcp = new AppComponentePermissao();
	$vappcp = $appcp->consultarAppComponentePermissao(4, $ID_TIPO);
	$parametro = "0";
	for($i = 0; $i < count($vappcp); $i++){
		$parametro .= $vappcp[$i]->getIdAppComponente();
		if(!empty($vappcp[$i+1])){
			$parametro .= ", ";
		}
	}
	
	$sqlm= "SELECT 
			  tb_app_componente.id_app_componente,
			  tb_app_componente.data,
			  ( tb_app_componente_menu.descricao ) AS value
			FROM
			  tb_app_componente
			  INNER JOIN tb_app_componente_menu ON (tb_app_componente.id_app_componente = tb_app_componente_menu.id_app_componente_menu)
			WHERE
			  (tb_app_componente.id_app_componente NOT IN (".$parametro."))";
	
	$sqlp = "SELECT 
			  tb_app_componente.id_app_componente,
			  tb_app_componente.data,
			  ( tb_app_componente_pagina.url ) AS value
			FROM
			  tb_app_componente
			  INNER JOIN tb_app_componente_pagina ON (tb_app_componente.id_app_componente = tb_app_componente_pagina.id_app_componente_pagina)
			WHERE
			  (tb_app_componente.id_app_componente NOT IN (".$parametro."))";
	
	$sqlr = "SELECT 
			  tb_app_componente.id_app_componente,
			  tb_app_componente.data,
			  ( tb_app_componente_regra.descricao ) AS value
			FROM
			  tb_app_componente
			  INNER JOIN tb_app_componente_regra ON (tb_app_componente.id_app_componente = tb_app_componente_regra.id_app_componente_regra)
			WHERE
			  (tb_app_componente.id_app_componente NOT IN (".$parametro."))";
	
	$sqlpm = "SELECT 
				  tb_app_componente_permissao.id_app_permissao,
				  tb_app_componente_permissao.id_app_usuario_grupo,
				  tb_app_componente_permissao.id_app_componente,
				  tb_app_componente_permissao.permissao,
				  ( tb_app_componente_menu.descricao ) AS value
				FROM
				  tb_app_componente_permissao
				  INNER JOIN tb_app_componente_menu ON (tb_app_componente_permissao.id_app_componente = tb_app_componente_menu.id_app_componente_menu)
				WHERE
				  (tb_app_componente_permissao.id_app_usuario_grupo = ".$ID_TIPO.")
				ORDER BY id_app_usuario_grupo, value";
	                                                          
	$sqlpp = "SELECT 
				  tb_app_componente_permissao.id_app_permissao,
				  tb_app_componente_permissao.id_app_usuario_grupo,
				  tb_app_componente_permissao.id_app_componente,
				  tb_app_componente_permissao.permissao,
				  ( tb_app_componente_pagina.url ) AS value
				FROM
				  tb_app_componente_permissao
  				  INNER JOIN tb_app_componente_pagina ON (tb_app_componente_permissao.id_app_componente = tb_app_componente_pagina.id_app_componente_pagina)
				WHERE
				  (tb_app_componente_permissao.id_app_usuario_grupo = ".$ID_TIPO.")
				ORDER BY value";

	$sqlpr = "SELECT 
				  tb_app_componente_permissao.id_app_permissao,
				  tb_app_componente_permissao.id_app_usuario_grupo,
				  tb_app_componente_permissao.id_app_componente,
				  tb_app_componente_permissao.permissao,
				  ( tb_app_componente_regra.descricao ) AS value
				FROM
				  tb_app_componente_permissao
  				  INNER JOIN tb_app_componente_regra ON (tb_app_componente_permissao.id_app_componente = tb_app_componente_regra.id_app_componente_regra)
				WHERE
				  (tb_app_componente_permissao.id_app_usuario_grupo = ".$ID_TIPO.")
				ORDER BY value";

	// ---------------------------------------------------------------------------|
	
	if ( ! Validacao::isVazio($frm["btsubmit"] ) ){
		
		// Validando dados do formulário
		if( Validacao::isVazio($frm["componente"]) ){
			$label_alerta_erro .="Selecione o Componente#";
		}
		
		if( Validacao::isVazio($frm["permissao"]) ){
			$label_alerta_erro .="Selecione a Permissão#";
		}
		
		if( Validacao::isVazio($label_alerta_erro) ){
			
			$p = new AppComponentePermissao();
			$p->setAppComponentePermissao(-1, $ID_TIPO, $frm["componente"], $frm["permissao"]);
			
			if( $p->inserirAppComponentePermissao() ){
				$label_alerta_concluido .="Cadastro efetuado com sucesso!#";
				//$label_alerta_status = "disabled";
				//System::Refresh(5, "app_permissao_cadastrar.php");
			}else{
				$label_alerta_erro .="Cadastro não Efetuado;";
			}
		}
	}
?>
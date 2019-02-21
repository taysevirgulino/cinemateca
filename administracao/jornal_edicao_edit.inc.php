<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "jornal_edicao_add.php";
	$link_edit = "jornal_edicao_edit.php?id=$ID";
	$link_remove = "jornal_edicao_remove.php?id=$ID";
	$link_list = "jornal_edicao_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new JornalEdicao();
	if(!$obj->buscarJornalEdicao(1, $ID)){ System::Redirect($link_list); }

	$frm_numero = System::_POST("FrmNumero");
	$frm_ano = System::_POST("FrmAno");
	$frm_data_inicial = System::_POST("FrmDataInicial");
	$frm_data_final = System::_POST("FrmDataFinal");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjJornalEstrutura = JornalEstruturaManage::consultarJornalEstruturaAttribute("", "", "", JornalEstruturaAttribute::Prioridade(), SearchOrder::Crescente());

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_numero) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Número#";
		}
		if( Validacao::isVazio($frm_ano) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Ano#";
		}
		if( Validacao::isVazio($frm_data_inicial) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data Inicial#";
		}
		if( Validacao::isVazio($frm_data_final) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data Final#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(JornalEdicaoManage::alterarJornalEdicao($ID, null, $frm_numero, $frm_ano, System::FormatarData($frm_data_inicial, "Y-m-d"), System::FormatarData($frm_data_final, "Y-m-d"), $frm_status)){
				$cont = 0;
				for($j=0; $j < count($VObjJornalEstrutura); $j++){
					
					$frm_imagem_file = $_FILES["FrmImagemFile".$VObjJornalEstrutura[$j]["id_jornal_estrutura"]];
					
					if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
						$upload = new Upload();
						$prename = date("YmdHis")."_";
						if($upload->SendFile($frm_imagem_file, "../images/jornal_pagina/$prename", 2)){
							$frm_imagem = $prename.$upload->getName();
							
							$i = new Imagem();
							$i->carregarImagem("../images/jornal_pagina/$frm_imagem");
							
							$i->salvarImagemByPorcentagemWidth(120, "../images/jornal_pagina/A$frm_imagem");
							$i->salvarImagemByPorcentagemWidth(177, "../images/jornal_pagina/B$frm_imagem");
							
							$i->salvarImagem(393, 580, "../images/jornal_pagina/mini/$frm_imagem");
							
							if($i->getImagemWidth() != 1000){
								$i->salvarImagemByPorcentagemWidth(1000, "../images/jornal_pagina/$frm_imagem");	
							}

							$Pagina = JornalPaginaManage::PaginaByEdicaoEstrutura($ID, $VObjJornalEstrutura[$j]["id_jornal_estrutura"]);
							if(!empty($Pagina)){
								JornalPaginaManage::alterarAtributoImagem($Pagina["id_jornal_pagina"], $frm_imagem);
							}else{
								JornalPaginaManage::inserirJornalPagina(-1, null, $obj->getIdJornalEdicao(), $VObjJornalEstrutura[$j]["id_jornal_estrutura"], $frm_imagem);
							}
							$cont++;
						}
					}
				}				
				
				$label_alerta_concluido .="Alteração efetuada com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				if($cont > 0){
					System::Redirect("jornal_edicao_edit.php?id=$ID");
				}else{
					System::Redirect("jornal_edicao_list.php");
				}
			}else{
				$label_alerta_erro .="Alteração não Efetuada";
			}
		}
	}else{
		$frm_numero = $obj->getNumero();
		$frm_ano = $obj->getAno();
		$frm_data_inicial = System::FormatarData($obj->getDataInicial(), "d/m/Y");
		$frm_data_final = System::FormatarData($obj->getDataFinal(), "d/m/Y");
		$frm_status = $obj->getStatus();
	}
?>
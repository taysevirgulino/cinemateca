<?
	$link_add = "agenda_add.php";
	$link_edit = "agenda_edit.php";
	$link_remove = "agenda_remove.php";
	$link_list = "agenda_list.php";

	$frm_id_agenda_categoria = System::_POST("FrmIdAgendaCategoria");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_data = System::_POST("FrmData");
	$frm_hora = System::_POST("FrmHora");
	$frm_local = System::_POST("FrmLocal");
	$frm_informacoes_contato = System::_POST("FrmInformacoesContato");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAgendaCategoria = AgendaCategoriaManage::consultarAgendaCategoria(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_agenda_categoria) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Categoria#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}
		if( Validacao::isVazio($frm_descricao) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Descriзгo#";
		}
		if( Validacao::isVazio($frm_data) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data#";
		}
		if( Validacao::isVazio($frm_hora) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Hora#";
		}
		
		$frm_imagem = "";
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/agenda/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				$i = new Imagem();
				$i->carregarImagem("../images/agenda/$frm_imagem");
				$i->salvarImagemByPorcentagemWidth(100, "../images/agenda/A$frm_imagem");
				$i->salvarImagemByCorte(80, 55, "../images/agenda/B$frm_imagem");
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AgendaManage::inserirAgenda(-1, null, null, $frm_id_agenda_categoria, $frm_titulo, $frm_descricao, System::FormatarData($frm_data, "Y-m-d"), $frm_hora, $frm_local, $frm_informacoes_contato, $frm_imagem, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro nгo Efetuado";
			}
		}
	}else{
		$frm_data = date("d/m/Y");
		$frm_hora = "00:00:00";
		$frm_status = 1;
	}
?>
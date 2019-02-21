<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "conteudo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "conteudo_add.php?back=$link_back";
	$link_edit = "conteudo_edit.php?back=$link_back";
	$link_remove = "conteudo_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_codigo = System::_POST("FrmCodigo");
	$frm_legenda = System::_POST("FrmLegenda");
	$frm_texto = System::_POST("FrmTexto");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_prioridade = ConteudoManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}
		if( Validacao::isVazio($frm_codigo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Código#";
		}
		$frm_imagem = "";
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/conteudo/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				/*$i = new Imagem();
				$i->carregarImagem("../images/conteudo/$frm_imagem");
				$frm_imagem = "alt_$frm_imagem";
				$i->salvarImagem(100, 100, "../images/conteudo/$frm_imagem");*/
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new Conteudo();
			$obj->setConteudo(-1, null, null, $frm_titulo, $frm_codigo, $frm_legenda, $frm_texto, $frm_imagem, $frm_prioridade);
			if($obj->inserirConteudo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>
<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "curriculo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "curriculo_add.php?back=$link_back";
	$link_edit = "curriculo_edit.php?back=$link_back";
	$link_remove = "curriculo_remove.php?back=$link_back";

	$frm_id_empreendimento = System::_POST("FrmIdEmpreendimento");
	$frm_id_curriculo_area = System::_POST("FrmIdCurriculoArea");
	$frm_id_curriculo_segmento = System::_POST("FrmIdCurriculoSegmento");
	$frm_nome = System::_POST("FrmNome");
	$frm_sobrenome = System::_POST("FrmSobrenome");
	$frm_sexo = System::_POST("FrmSexo");
	$frm_data_nascimento = System::_POST("FrmDataNascimento");
	$frm_cpf = System::_POST("FrmCpf");
	$frm_estado_civil = System::_POST("FrmEstadoCivil");
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_telefone2 = System::_POST("FrmTelefone2");
	$frm_email = System::_POST("FrmEmail");
	$frm_endereco = System::_POST("FrmEndereco");
	$frm_cidade = System::_POST("FrmCidade");
	$frm_estado = System::_POST("FrmEstado");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEmpreendimento = EmpreendimentoManage::consultarEmpreendimento(1, "");
	$VObjCurriculoArea = CurriculoAreaManage::consultarCurriculoArea(1, "");
	$VObjCurriculoSegmento = CurriculoSegmentoManage::consultarCurriculoSegmento(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_empreendimento) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Empreendimento#";
		}
		if( Validacao::isVazio($frm_id_curriculo_area) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Currículo Área#";
		}
		if( Validacao::isVazio($frm_id_curriculo_segmento) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Currículo Segmento#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_sobrenome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Sobrenome#";
		}
		if( Validacao::isVazio($frm_sexo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Sexo#";
		}
		if( Validacao::isVazio($frm_data_nascimento) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data Nascimento#";
		}
		if( Validacao::isVazio($frm_cpf) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Cpf#";
		}
		$frm_imagem = "";
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/curriculo/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				/*$i = new Imagem();
				$i->carregarImagem("../images/curriculo/$frm_imagem");
				$frm_imagem = "alt_$frm_imagem";
				$i->salvarImagem(100, 100, "../images/curriculo/$frm_imagem");*/
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}
		$frm_arquivo = "";
		if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_file, "../files/curriculo/$prename", 1)){
				$frm_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Curriculo();
			$obj->setIdEmpreendimento( $frm_id_empreendimento ); 
			$obj->setIdCurriculoArea( $frm_id_curriculo_area ); 
			$obj->setIdCurriculoSegmento( $frm_id_curriculo_segmento ); 
			$obj->setNome( $frm_nome ); 
			$obj->setSobrenome( $frm_sobrenome ); 
			$obj->setSexo( $frm_sexo ); 
			$obj->setDataNascimento( System::FormatarData($frm_data_nascimento, "Y-m-d") );
			$obj->setCpf( $frm_cpf ); 
			$obj->setEstadoCivil( $frm_estado_civil ); 
			$obj->setTelefone( $frm_telefone ); 
			$obj->setTelefone2( $frm_telefone2 ); 
			$obj->setEmail( $frm_email ); 
			$obj->setEndereco( $frm_endereco ); 
			$obj->setCidade( $frm_cidade ); 
			$obj->setEstado( $frm_estado ); 
			$obj->setImagem( $frm_imagem ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirCurriculo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>
<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "empreendimento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "empreendimento_add.php?back=$link_back";
	$link_edit = "empreendimento_edit.php?back=$link_back";
	$link_remove = "empreendimento_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_endereco = System::_POST("FrmEndereco");
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_email = System::_POST("FrmEmail");
	$frm_area_bruta_locavel = System::_POST("FrmAreaBrutaLocavel");
	$frm_area_total_construida = System::_POST("FrmAreaTotalConstruida");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Empreendimento();
			$obj->setTitulo( $frm_titulo ); 
			$obj->setEndereco( $frm_endereco ); 
			$obj->setTelefone( $frm_telefone ); 
			$obj->setEmail( $frm_email ); 
			$obj->setAreaBrutaLocavel( System::ConverterDouble($frm_area_bruta_locavel) ); 
			$obj->setAreaTotalConstruida( System::ConverterDouble($frm_area_total_construida) ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirEmpreendimento()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}else{
	    $frm_area_bruta_locavel = 0;
	    $frm_area_total_construida = 0;
	    $frm_status = 1;
	}
?>